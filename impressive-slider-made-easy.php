<?php
/*
  Plugin Name: Impressive Slider Made Easy
  Plugin URI: http://www.wpexpertdeveloper.com/impressive-slider-made-easy/
  Description: Create aweosome Image slider with jQuery JSSOR Slider. 
  Version: 1.3
  Author: Rakhitha Nimesh
  Author URI: http://www.innovativephp.com
 */


// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/* Main Class for Image Slider Made Easy */
if( !class_exists( 'WISME_Image_Slider' ) ) {
    
    class WISME_Image_Slider{
    
        private static $instance;

        /* Create instances of plugin classes and initializing the features  */
        public static function instance() {
            
            if ( ! isset( self::$instance ) && ! ( self::$instance instanceof WISME_Image_Slider ) ) {
                self::$instance = new WISME_Image_Slider();
                self::$instance->setup_constants();

                //add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
                self::$instance->includes();

                add_action('wp_enqueue_scripts',array(self::$instance,'load_scripts'),9);
                add_action('admin_enqueue_scripts', array(self::$instance,'load_admin_scripts'));
                 
                self::$instance->template_loader    = new WISME_Template_Loader();
                self::$instance->image_slider       = new WISME_Slider_Manager();
            }
            return self::$instance;
        }

        /* Setup constants for the plugin */
        private function setup_constants() {
            
            // Plugin version
            if ( ! defined( 'WISME_VERSION' ) ) {
                define( 'WISME_VERSION', '1.2' );
            }

            // Plugin Folder Path
            if ( ! defined( 'WISME_PLUGIN_DIR' ) ) {
                define( 'WISME_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
            }

            // Plugin Folder URL
            if ( ! defined( 'WISME_PLUGIN_URL' ) ) {
                define( 'WISME_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
            }

            if ( ! defined( 'WISME_IMAGE_SLIDER_POST_TYPE' ) ) {
                define( 'WISME_IMAGE_SLIDER_POST_TYPE', 'wisme_slider');
            }
        }

        /* Load scripts and styles for frontend */
        public function load_scripts(){
          
            wp_register_style('wisme-front-style', WISME_PLUGIN_URL . 'css/wisme-front.css');
            wp_enqueue_style('wisme-front-style');

            wp_register_script('wisme-front', WISME_PLUGIN_URL.'js/wisme-front.js', array('jquery'));
           
            wp_register_script('wisme-jssor-slides-script', WISME_PLUGIN_URL.'lib/jssor/jssor.slider.mini.js', array('jquery'));
            
            wp_register_script('wisme-slider-init', WISME_PLUGIN_URL.'js/wisme-slider-init.js', array('jquery'));
           
        }

        public function load_admin_scripts(){
            wp_register_script('wisme-admin', WISME_PLUGIN_URL.'js/wisme-admin.js', array('jquery','media-upload','thickbox'));
            wp_enqueue_script('wisme-admin');

            $wisme_admin = array(
                'AdminAjax' => admin_url('admin-ajax.php'),
                'images_path' =>  WISME_PLUGIN_URL . 'images/',
                'addToSlider' => __('Add to Slider','wisme'), 
                'insertToSlider' => __('Insert Images to Slider','wisme'),      
            );
            wp_localize_script('wisme-admin', 'WISMEAdmin', $wisme_admin);


            wp_register_style('wisme-admin-style', WISME_PLUGIN_URL . 'css/wisme-admin.css');
            wp_enqueue_style('wisme-admin-style');
        }
        
        /* Include class files */
        private function includes() {

            require_once WISME_PLUGIN_DIR . 'classes/class-wisme-template-loader.php';
            require_once WISME_PLUGIN_DIR . 'classes/class-wisme-slider-manager.php';
            require_once WISME_PLUGIN_DIR . 'functions.php';

            if ( is_admin() ) {}
        }
    
    }
}

/* Intialize WISME_Image_Slider  instance */
function WISME_Image_Slider() {
    global $wisme;    
	$wisme = WISME_Image_Slider::instance();
}

WISME_Image_Slider();


















