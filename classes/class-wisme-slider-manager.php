<?php

/* Manage features of Image Slider */
class WISME_Slider_Manager{

	/* Intialize actions and filters required for fields */
	public function __construct(){
		add_action( 'add_meta_boxes', array($this,'image_slider_meta_box'));

		add_action('init',array($this,'register_image_sliders'));

        add_action( 'save_post', array($this,'save_image_sliders' ));				

        add_filter( 'wp_insert_post_data', array($this,'add_image_slider'), '99', 2 );

        add_shortcode( 'wisme_slider' , array($this,'wisme_image_slider'));

        add_filter( 'manage_edit-wisme_slider_columns', array($this,'edit_wisme_image_slider_columns' ) );
        add_action( 'manage_wisme_slider_posts_custom_column', array($this,'manage_wisme_image_slider_columns'), 10, 2 );

        add_action( 'add_meta_boxes', array($this, 'remove_other_meta_boxes'), 999 );

        add_action('admin_menu', array(&$this, 'admin_settings_menu'), 9);
    
    }

    /* Add Getting started menu */
    public function admin_settings_menu(){
        add_submenu_page( 'edit.php?post_type='.WISME_IMAGE_SLIDER_POST_TYPE, __('Getting Started', 'wisme' ), __('Getting Started', 'wisme'),'manage_options','wisme-help',array(&$this,'help'));
    
    }

    /* Add meta boxes for Image Slider - images, settings and shortcode */
	public function image_slider_meta_box(){
		add_meta_box(
                    'wisme-image-slider-images',
                    __( 'Impressive Image Slider - Manage Images', 'wisme' ),
                    array($this,'manage_slider_images'),
                    WISME_IMAGE_SLIDER_POST_TYPE
                );

        add_meta_box(
                    'wisme-image-slider-settings',
                    __( 'Impressive Image Slider - Manage Settings', 'wisme' ),
                    array($this,'manage_slider_settings'),
                    WISME_IMAGE_SLIDER_POST_TYPE
                );

        add_meta_box(
                    'wisme-image-slider-shortcode',
                    __( 'Impressive Image Slider - Shortcode', 'wisme' ),
                    array($this,'manage_slider_shortcode'),
                    WISME_IMAGE_SLIDER_POST_TYPE,
                    'side'
                );
	}

    /* Display uploaded images in image slider meta box */
    public function manage_slider_images($post){
        global $wisme,$wisme_slider_params;

        wp_enqueue_media();
        wp_enqueue_script('jquery-ui-sortable');

        $wisme_slider_params['post'] = $post;

        ob_start();
        $wisme->template_loader->get_template_part('manage-slider-images');    
        $display = ob_get_clean();  
        echo $display;
    }

    /* Display settings in image slider meta box */
    public function manage_slider_settings($post){
        global $wisme,$wisme_slider_params;

        $wisme_slider_params['post'] = $post;

        ob_start();
        $wisme->template_loader->get_template_part('manage-slider-settings');    
        $display = ob_get_clean();  
        echo $display;
    }

    /* Display shortcode for image slider in image slider meta box */
    public function manage_slider_shortcode($post){
        if(isset($post->ID)){
            echo "<div class='wisme-shortcode'>[wisme_slider id='". $post->ID ."' ]</div>";
        }
    }

    /* Register new custom post type for image sliders */
	public function register_image_sliders(){

        register_post_type( WISME_IMAGE_SLIDER_POST_TYPE,
            array(
                'labels' => array(
                    'name'              => __('Impressive Sliders','wisme'),
                    'singular_name'     => __('Impressive Slider','wisme'),
                    'add_new'           => __('Add New','wisme'),
                    'add_new_item'      => __('Add New Impressive Slider','wisme'),
                    'edit'              => __('Edit','wisme'),
                    'edit_item'         => __('Edit Impressive Slider','wisme'),
                    'new_item'          => __('New Impressive Slider','wisme'),
                    'view'              => __('View','wisme'),
                    'view_item'         => __('Preview Impressive Slider','wisme'),
                    'search_items'      => __('Search Impressive Slider','wisme'),
                    'not_found'         => __('No Impressive Slider found','wisme'),
                    'not_found_in_trash' => __('No Impressive Slider found in Trash','wisme'),
                ),

                'public' => true,
                'menu_position' => 100,
                'supports' => array( 'title'),
                'has_archive' => true
            )
        );

	}

    /* Save image slider images and settings */
    public function save_image_sliders($post_id){


        if ( ! isset( $_POST['wisme_image_slider_nonce'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['wisme_image_slider_nonce'], 'wisme_image_slider_settings' ) ) {
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        if ( isset( $_POST['post_type'] ) && $_POST['post_type'] == WISME_IMAGE_SLIDER_POST_TYPE ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }
        }

        $slider_images = isset( $_POST['wisme_slider_uploaded_images'] ) ? $_POST['wisme_slider_uploaded_images'] : '';
        $slider_settings = isset( $_POST['wisme_slider_settings'] ) ? $_POST['wisme_slider_settings'] : array(); 
        
        update_post_meta( $post_id, '_wisme_slider_images', $slider_images );
        update_post_meta( $post_id, '_wisme_slider_settings', $slider_settings );
    }

    /* Add image slider shortcode when saving to enable preview */
    public function add_image_slider($data , $postarr){
        if($data['post_type'] == WISME_IMAGE_SLIDER_POST_TYPE && isset($postarr['post_ID'])){
            $post_id = $postarr['post_ID'];
            $data['post_content'] = "[wisme_slider id='".$post_id."' ]";
        }
        return $data;
    }

    /* Display image slider in frontend using the shortcode */
    public function wisme_image_slider($attr){
        global $wisme,$wisme_slider_params;

        $post_id =  $attr['id'];
        $wisme_slider_params['post_id'] = $post_id;

        wp_enqueue_script('wisme-jssor-slides-script');
        wp_enqueue_script('wisme-front');

        $slider_settings = (array) get_post_meta( $post_id, '_wisme_slider_settings', true );

        $wisme_slider_params['slider_width'] = isset($slider_settings['slider_width']) ? (int) $slider_settings['slider_width'] : '600';
        $wisme_slider_params['slider_height'] = isset($slider_settings['slider_height']) ? (int) $slider_settings['slider_height'] : '300';
    
        $transition = isset($slider_settings['transition']) ? $slider_settings['transition'] : 'fade';
        $wisme_slider_params['transition_effect'] = wisme_transitions_list($transition);
        $wisme_slider_params['auto_play'] = ($slider_settings['auto_play'] == 'enabled') ? 'true' : 'false';

        $wisme_slider_params['show_arrows'] = isset($slider_settings['show_arrows']) ? $slider_settings['show_arrows'] : 'enabled';
        $wisme_slider_params['arrow_type']  = isset($slider_settings['arrow_type']) ? $slider_settings['arrow_type'] : 'a01';
        // $custom_css = ($slider_settings['custom_css'] != '') ? $slider_settings['custom_css'] : '';
        $wisme_slider_params['slider_type']  = isset($slider_settings['slider_type']) ? $slider_settings['slider_type'] : 'image_slider';

        $wisme_slider_params['number_of_slides']  = isset($slider_settings['number_of_slides']) ? $slider_settings['number_of_slides'] : '3';
        $wisme_slider_params['slide_width']  = isset($slider_settings['slide_width']) ? $slider_settings['slide_width'] : '200';
        $wisme_slider_params['autoplay_interval']  = isset($slider_settings['autoplay_interval']) ? $slider_settings['autoplay_interval'] : '1';
        $wisme_slider_params['autoplay_steps']  = isset($slider_settings['autoplay_steps']) ? $slider_settings['autoplay_steps'] : '4';
  
        $wisme_slider_params['thumbnail_visibility']  = isset($slider_settings['thumbnail_visibility']) ? $slider_settings['thumbnail_visibility'] : '2';
        $wisme_slider_params['thumbnail_gallery_design']  = isset($slider_settings['thumbnail_gallery_design']) ? $slider_settings['thumbnail_gallery_design'] : 'inside';
        $wisme_slider_params['thumbnail_back_color']  = isset($slider_settings['thumbnail_back_color']) ? $slider_settings['thumbnail_back_color'] : '';


        $slider_images_str = get_post_meta( $post_id , '_wisme_slider_images', true );
        $wisme_slider_params['slider_images'] = explode(',', $slider_images_str);

        $upload_dir = wp_upload_dir();
        $wisme_slider_params['upload_dir_url'] = $upload_dir['baseurl']."/";
        $wisme_slider_params['upload_sub_dir_url'] = $upload_dir['baseurl'].$upload_dir['subdir']."/";

        // ADd template support for each slider type
        ob_start();

        $display = '';
        $wisme_slider_params['additional_options']  = $this->additional_options($wisme_slider_params);
        switch ($wisme_slider_params['slider_type']) {
            case 'image_slider':
                $wisme->template_loader->get_template_part('image-slider','default');
                $wisme->template_loader->get_template_part('slider-init','default');
                $display = ob_get_clean();
                break;
            
            case 'vertical_image_slider':
                $wisme->template_loader->get_template_part('image-slider','default');
                $wisme->template_loader->get_template_part('slider-init','default');
                $display .= ob_get_clean();
                break;

            case 'image_gallery':
                $wisme->template_loader->get_template_part('image-gallery','default');
                $wisme->template_loader->get_template_part('slider-init','default');
                $display .= ob_get_clean();
                break;

            case 'thumbnail_slider':
                $wisme->template_loader->get_template_part('image-slider','default');
                $wisme->template_loader->get_template_part('slider-init','default');
                $display .= ob_get_clean();
                break;

            case 'tab_slider':
                $wisme->template_loader->get_template_part('tab-slider','default');
                $wisme->template_loader->get_template_part('slider-init','default');
                $display .= ob_get_clean();
                break;

            default:
                # code...
                break;
        }



        // $display = "<div id='wisme-slider-container-".$post_id."' class='jssor_slider_outer_container' style='position: relative; top: 0px; left: 0px; width:". $slider_width."px;height:".$slider_height."px;' >";
        // //$display .= "<div id='wisme-front-slider-".$post_id."' class='wisme-front-slider' >";
        // $display .= "<div u='slides' class='jssor_slider_slides' style='width:". $slider_width."px;height:".$slider_height."px;cursor:default;overflow:hidden;' >";
        // foreach($slider_images as $attach_id){
        //         if($attach_id != ''){
        //             $attachment = wp_get_attachment_metadata( $attach_id );
        //             // $thumbnail = isset($attachment['sizes']['medium']['file']) ? $upload_sub_dir_url.$attachment['sizes']['medium']['file'] : $upload_dir_url.$attachment['file'];

        //             $display .= "<div class='wisme-front-slider-single'>
        //                             <img data-u='image' src='". $upload_dir_url.$attachment['file'] ."' alt='" . $attachment['image_meta']['title'] . "' >
        //                             <img data-u='thumb' src=". $upload_dir_url.$attachment['file'] ." />
        //                             </div>";
     

        //     }
        // }

        // $display .= "</div>";


        // $display .= '<!-- Thumbnail Navigator -->
        //                 <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
        //                     <!-- Thumbnail Item Skin Begin -->
        //                     <div data-u="slides" style="cursor: default;">
        //                         <div data-u="prototype" class="p">
        //                             <div class="w">
        //                                 <div data-u="thumbnailtemplate" class="t"></div>
        //                             </div>
        //                             <div class="c"></div>
        //                         </div>
        //                     </div>
        //                     <!-- Thumbnail Item Skin End -->
        //                 </div>';

        // // Arrows
        // if($show_arrows == 'enabled'){
        //     $display .= "<span u='arrowleft' class='jssor".$arrow_type."l' style='top: ". (int) ($slider_height/2)."px; left: 8px;'></span>        
        //                     <span u='arrowright' class='jssor".$arrow_type."r' style='top: ". (int) ($slider_height/2)."px; right: 8px;'></span>";
        // }

        // $display .= "</div>";
      
        

        /* Logo/ Thumbnail Slider */
        $html = $display;
        return $html;
    }
    
    /* Add image slider shortcode to image slider list */
    public function edit_wisme_image_slider_columns( $columns ) {

        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'Impressive Slider','wisme' ),
            'shortcode' => __( 'Shortcode','wisme'),
            'date' => __( 'Date','wisme' )
        );

        return $columns;
    }

    /* Add image slider shortcode to image slider list */
    public function manage_wisme_image_slider_columns( $column, $post_id ) {
        global $post;

        switch( $column ) {
            case 'shortcode' :
                echo "[wisme_slider id='".$post_id."' ]";   
                break;
            default :
                break;
        }
    }

    /* Remove meta boxes generated by other plugins for Image Slider post type */
    public function remove_other_meta_boxes(){
        global $wp_meta_boxes;

        $allowed_meta_boxes = array('submitdiv','wisme_image_slider','wisme-image-slider-shortcode','wisme-image-slider-images',
            'wisme-image-slider-settings','slugdiv');
        foreach ($wp_meta_boxes as $post_type => $meta_box) {
            if($post_type == WISME_IMAGE_SLIDER_POST_TYPE){
                foreach ($meta_box as $context => $context_value) {
                    foreach ($context_value as $priority => $priority_value) {
                        foreach ($priority_value as $meta_box_key => $meta_box_settings) {
                            if(!in_array($meta_box_key, $allowed_meta_boxes)){
                                unset($wp_meta_boxes[$post_type][$context][$priority][$meta_box_key]);
                            }
                        }
                    }
                }
            }
        }
    }

    /* Help and information about the plugin */
    public function help(){
        global $wisme;
        ob_start();
        $wisme->template_loader->get_template_part('plugin-help');    
        $display = ob_get_clean();  
    
        echo $display;
    }

    public function additional_options($wisme_slider_params){
        extract($wisme_slider_params);


        $additional_options = '';
        switch ($slider_type) {
            case 'image_slider':
                $additional_options = '';
                break;
            
            case 'vertical_image_slider':
                $additional_options = '$DragOrientation: 2,$PlayOrientation: 2';
                break;

            case 'image_gallery':
                $additional_options = '$ThumbnailNavigatorOptions: {
                                            $Class: $JssorThumbnailNavigator$,
                                            $Cols: 10,
                                            $SpacingX: 8,
                                            $SpacingY: 8,
                                            $Align: 360,
                                            $ChanceToShow:'.$thumbnail_visibility.',
                                            //$Rows : 2
                                          }';
                break;

            case 'thumbnail_slider':
                $additional_options = '$AutoPlaySteps: '.$autoplay_steps.',
                                        $SlideDuration: 2600,
                                        $SlideEasing: $Jease$.$Linear,
                                        $Idle: '.$autoplay_interval.',
                                        // $PauseOnHover: 4,
                                        $SlideWidth: '.$slide_width.',
                                        $Cols: '.$number_of_slides.', ';
                break;

            case 'tab_slider':
                $additional_options = '$ThumbnailNavigatorOptions: {
                                            $Class: $JssorThumbnailNavigator$,
                                            $Cols: 3,
                                            $Align: 200,
                                          }';
                break;

            default:
                # code...
                break;
        }

        $additional_options  = apply_filters('wisme_slider_additional_options',$additional_options, array('slider_type' => $slider_type));

        return $additional_options;
    }
}
