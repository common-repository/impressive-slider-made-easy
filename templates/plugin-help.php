<?php

$tab = isset($_GET['tab']) ? $_GET['tab'] : 'getting_started';

$title = sprintf( __( 'Welcome to Impressive Slider Made Easy %s', 'wisme' ), WISME_VERSION ) ;
$desc = __( 'Thank you for choosing Impressive Slider Made Easy.','wisme');
$desc .= "<a href='http://goo.gl/aWWdQk' target='_blank'>".__('Visit Plugin Home Page','wisme')."</a>";

?>

<div class="wrap about-wrap">
	<h1><?php echo $title; ?></h1>
	<div class="about-text">
		<?php echo $desc; ?>
	</div>

	<h2 class="nav-tab-wrapper">
		<a class="nav-tab <?php echo ($tab == 'getting_started') ? 'nav-tab-active' : '' ; ?>" href="<?php echo admin_url( 'admin.php?page=wisme-help&tab=getting_started' ) ?>">
			<?php _e( 'Getting Started', 'wisme' ); ?>
		</a>
		<a class="nav-tab <?php echo ($tab == 'support_docs') ? 'nav-tab-active' : '' ; ?>" href="<?php echo admin_url( 'admin.php?page=wisme-help&tab=support_docs' ) ?>">
			<?php _e( 'Documentation and Support', 'wisme' ); ?>
		</a>
		<a class="nav-tab <?php echo ($tab == 'wpexpert_plugins') ? 'nav-tab-active' : '' ; ?>" href="<?php echo admin_url( 'admin.php?page=wisme-help&tab=wpexpert_plugins' ) ?>">
			<?php _e( 'Plugins by WP Expert Developer', 'wisme' ); ?>
		</a>
		
	</h2>

	<?php if($tab == 'getting_started'){ ?> 
	<div class="wpexpert-help-tab">
		<div class="feature-section">

			
			<h2><?php _e( 'Creating Impressive Sliders', 'wisme' );?></h2>

			<p><?php _e( 'First, you have to go to <strong>Add New</strong> menu item of <strong>Impressive Sliders</strong> in WordPress left menu. ', 'wisme' ); ?></p>

			<div class="wpexpert-help-screenshot">
				<img src="http://www.wpexpertdeveloper.com/wp-content/uploads/2015/12/add_new_slider.png" />
			</div>


			<h4><?php _e( 'Adding Images and Configuring Settings', 'wisme' );?></h4>
			<p><?php _e( 'You can click on the Add Images area to upload images to your Impressive Slider. Then use the meta box under the title to
			configure the settings according to your preference.', 'wisme' );?></p>

			<div class="wpexpert-help-screenshot">
				<img src="http://www.wpexpertdeveloper.com/wp-content/uploads/2015/12/slider_with_images.png" class="wpexpert-help-screenshot"/>
			</div>

			<p><?php _e( 'Finally, copy the shortcode from the right side meta box and add it to a post/page to view the slider in action.', 'wisme' );?></p>

			<h4><?php _e( 'Demos', 'wisme' );?></h4>
			<p>
				<ul class="wpexpert-help-list">
					<li><a target="_blank" href="http://www.wpexpertdeveloper.com/impressive-slider-demo/"><?php _e('Impressive Slider Demo Generator','wisme'); ?></a></li>
				</ul>
			</p>

			<p><?php _e( 'More details available at .', 'wisme' );?><a href="http://goo.gl/aWWdQk"><?php _e('Plugin Home Page','wisme'); ?></a></p>


			
		</div>
		
	</div>
	<?php } ?>

	<?php if($tab == 'support_docs'){ ?>
	<div class="wpexpert-help-tab">

		<div class="feature-section">
			<h2><?php _e( 'Documentation', 'wisme' );?></h2>

			<p>
				<?php _e( 'Complete documentation for this plugin is available at ', 'wisme' ); ?>
				<a target="_blank" href="http://goo.gl/aWWdQk">WP Expert Developer</a>.
			</p>

			<h2><?php _e( 'Support', 'wisme' );?></h2>

			<h4><?php _e( 'Free Support', 'wisme' );?></h4>
			<p><?php _e('You can get free support fot this plugin at '); ?>
				<a target="_blank" href="https://wordpress.org/support/plugin/impressive-slider-made-easy"><?php _e('wordpress.org','wisme');?></a>.
			</p>


		</div>
	</div>
	<?php } ?>

	<?php if($tab == 'wpexpert_plugins'){ ?>
	<div class="wpexpert-help-tab">

		<div class="feature-section">

			<h2><?php _e('Explore WP Expert Developer Plugins'); ?></h2>

			<div class="wpexpert-plugins-panel">
				<?php
					global $wisme,$wpexpert_plugins_data;
					$plugins_json = wp_remote_get( 'http://www.wpexpertdeveloper.com/plugins.json');  
	        
			        if ( ! is_wp_error( $plugins_json ) ) {

			            $plugins = json_decode( wp_remote_retrieve_body($plugins_json) );
			            $plugins = $plugins->featured;

			            
			        }else{
			        	$plugins = array();
			        }

		        	$wpexpert_plugins_data['plugins'] = $plugins;
        
			        ob_start();
			        $wisme->template_loader->get_template_part('plugins-feed');
			        $display = ob_get_clean();
			        echo $display;
		        ?>
				
			</div>
		</div>
	</div>
	<?php } ?>

</div>
