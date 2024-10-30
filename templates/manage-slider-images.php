<?php
    global $wisme_slider_params;
    extract($wisme_slider_params);

    // Get uploaded images for specific image slider
    $slider_images_str = get_post_meta( $post->ID , '_wisme_slider_images', true );
    $slider_images = explode(',', $slider_images_str);

    $upload_dir = wp_upload_dir();
    $upload_dir_url = $upload_dir['baseurl']."/";
?>


<div id="wisme-slider-images-panel" >
    <div id="wisme-slider-images-panel-upload" ><?php _e('Add Images','wisme'); ?></div>
    <div id="wisme-slider-images-panel-gallery" >
        <?php 

            foreach($slider_images as $attach_id){
                if($attach_id != ''){
                    $image_icons = "<img class='wisme-slider-edit' src='" . WISME_PLUGIN_URL ."images/slider-edit.png' />
                                    <img class='wisme-slider-delete' src='" . WISME_PLUGIN_URL . "images/slider-delete.png' />";

                    $attachment = wp_get_attachment_metadata( $attach_id );
        ?>
                    <div class='wisme-slider-images-panel-gallery-single'>
                        <img src="<?php echo $upload_dir_url.$attachment['file']; ?>" data-attchement-id='<?php echo $attach_id; ?>' class='wisme-slider-preview-thumb' />
                        <div class='wisme-slider-images-panel-gallery-icons'><?php echo $image_icons; ?></div>
                    </div>
                
        <?php
                }
            }
        ?>
    </div>
    <input type="hidden" name="wisme_slider_uploaded_images" id="wisme_slider_uploaded_images" value="<?php echo $slider_images_str; ?>" />
    <div class='wisme-clear'></div>
</div>

<?php wp_nonce_field( 'wisme_image_slider_settings', 'wisme_image_slider_nonce' ); ?>