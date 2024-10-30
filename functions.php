<?php

/* Remove Preview button from Image Slider Post Type */
function wisme_admin_css() {
    global $post_type;
    $post_types = array(
                        /* set post types */ 
                        WISME_IMAGE_SLIDER_POST_TYPE,
                  );
    if(in_array($post_type, $post_types))
    	echo '<style type="text/css">#post-preview{display: none;}</style>';
}
add_action( 'admin_head-post-new.php', 'wisme_admin_css' );
add_action( 'admin_head-post.php', 'wisme_admin_css' );

function wisme_transitions_list($key){

	$transitions_list = array(
		'fade' 				=> '{$Duration:1200,$Opacity:2}',
		'fade_in_l' 		=> '{$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_in_r' 		=> '{$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_in_t' 		=> '{$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_in_b' 		=> '{$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',				
		'fade_in_lr_chess'  => '{$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_in_tb_chess'  => '{$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_out_l' 		=> '{$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_out_r' 		=> '{$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_out_t' 		=> '{$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_out_b' 		=> '{$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_out_lr_chess' => '{$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_out_tb_chess' => '{$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_out_corners' => '{$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'fade_fly_in_l' => '{$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true}',
		'fade_fly_in_r' => '{$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true}',
		'fade_fly_in_t' => '{$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true}',
		'fade_fly_in_b' => '{$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true}',
		'fade_fly_in_lr' => '{$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true}',
		'fade_fly_in_lr_chess' => '{$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true}',
		'fade_fly_in_tb' => '{$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true}',
		'swing_inside_in_stairs' => '{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}}',
		'swing_inside_in_square' => '{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}}',
		'swing_inside_in_random' => '{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}}',
		'swing_outside_in_stairs' => '{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}}',
		'swing_outside_in_square' => '{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}}',
		'swing_outside_in_random' => '{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}}',
		'swing_outside_out_stairs' => '{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}}',
		'swing_outside_out_square' => '{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}}',
		'swing_outside_out_random' => '{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}}',
		'zoom_plus_in' => '{$Duration:1000,$Zoom:11,$Easing:{$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_plus_in_l' => '{$Duration:1000,x:4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_plus_in_r' => '{$Duration:1000,x:-4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2,$Round:{$Top:2.5}}',
		'zoom_plus_in_t' => '{$Duration:1000,y:4,$Zoom:11,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_plus_in_b' => '{$Duration:1000,y:-4,$Zoom:11,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_plus_in_tl' => '{$Duration:1000,x:4,y:4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_plus_in_tr' => '{$Duration:1000,x:-4,y:4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_plus_in_bl' => '{$Duration:1000,x:4,y:-4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_plus_in_br' => '{$Duration:1000,x:-4,y:-4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',		
		'zoom_plus_out' => '{$Duration:1000,$Zoom:11,$SlideOut:true,$Easing:{$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'zoom_plus_out_l' => '{$Duration:1000,x:4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'zoom_plus_out_r' => '{$Duration:1000,x:-4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'zoom_plus_out_t' => '{$Duration:1000,y:4,$Zoom:11,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'zoom_plus_out_b' => '{$Duration:1000,y:-4,$Zoom:11,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'zoom_plus_out_tl' => '{$Duration:1000,x:4,y:4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'zoom_plus_out_tr' => '{$Duration:1000,x:-4,y:4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'zoom_plus_out_bl' => '{$Duration:1000,x:4,y:-4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'zoom_plus_out_br' => '{$Duration:1000,x:-4,y:-4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'zoom_minus_in' => '{$Duration:1200,$Zoom:1,$Easing:{$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_minus_in_l' => '{$Duration:1200,x:0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_minus_in_r' => '{$Duration:1200,x:-0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_minus_in_t' => '{$Duration:1200,y:0.6,$Zoom:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_minus_in_b' => '{$Duration:1200,y:-0.6,$Zoom:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_minus_in_tl' => '{$Duration:1200,x:0.6,y:0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_minus_in_tr' => '{$Duration:1200,x:-0.6,y:0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_minus_in_bl' => '{$Duration:1200,x:0.6,y:-0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
		'zoom_minus_in_br' => '{$Duration:1200,x:-0.6,y:-0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',		
		'zoom_minus_out' => '{$Duration:1000,$Zoom:1,$SlideOut:true,$Easing:{$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}',
		'rotate_v_double_plus_in' => '{$Duration:1200,x:-1,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.8}}',
		'rotate_h_double_plus_in' => '{$Duration:1200,x:2,y:1,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_v_double_minus_in' => '{$Duration:1200,x:-0.5,y:1,$Rows:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_h_double_minus_in' => '{$Duration:1200,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_v_double_plus_out' => '{$Duration:1000,x:-1,y:2,$Rows:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.85}}',
		'rotate_h_double_plus_out' => '{$Duration:1000,x:4,y:2,$Cols:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}}',
		'rotate_v_double_minus_out' => '{$Duration:1000,x:-0.5,y:1,$Rows:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_h_double_minus_out' => '{$Duration:1000,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_v_fork_plus_in' => '{$Duration:1200,x:-4,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_h_fork_plus_in' => '{$Duration:1200,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.8}}',
		'rotate_v_fork_plus_out' => '{$Duration:1000,x:-3,y:1,$Rows:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_h_fork_plus_out' => '{$Duration:1000,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}}',
		'rotate_zoom_plus_in' => '{$Duration:1200,$Zoom:11,$Rotate:1,$Easing:{$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_zoom_plus_in_l' => '{$Duration:1200,x:4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_zoom_plus_in_r' => '{$Duration:1200,x:-4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_zoom_plus_in_t' => '{$Duration:1200,y:4,$Zoom:11,$Rotate:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_zoom_plus_in_b' => '{$Duration:1200,y:-4,$Zoom:11,$Rotate:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_zoom_plus_in_tl' => '{$Duration:1200,x:4,y:4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_zoom_plus_in_tr' => '{$Duration:1200,x:-4,y:4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_zoom_plus_in_bl' => '{$Duration:1200,x:4,y:-4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'rotate_zoom_plus_in_br' => '{$Duration:1200,x:-4,y:-4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}}',
		'jump_in_straight' => '{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}}',
		'jump_in_swirl' => '{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}}',
		'jump_in_zigzag' => '{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}}',
		'jump_in_square' => '{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}}',
		'jump_in_circle' => '{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}}',
		'jump_in_square_chess' => '{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}}',
		'jump_in_rectangle' => '{$Duration:1500,x:-1,y:-0.5,$Delay:800,$Cols:8,$Rows:4,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}}',
		'jump_in_rectangle_cross' => '{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}}',
		'jump_out_straight' => '{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}}',
		'jump_out_swirl' => '{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}}',
		'jump_out_zigzag' => '{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}}',
		'jump_out_square' => '{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}}',
		'jump_out_circle' => '{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}}',
		'jump_out_square_chess' => '{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}}',
		'jump_out_rectangle' => '{$Duration:1500,x:-1,y:0.5,$Delay:800,$Cols:8,$Rows:4,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}}',
		'jump_out_rectangle_cross' => '{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}}',
		'flutter_inside_in' => '{$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:0.8}}',
		'collapse_stairs' 	=> '{$Duration:1000,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$JssorEasing$.$EaseOutQuad}',
		'expand_stairs' 	=> '{$Duration:1000,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:$JssorEasing$.$EaseInQuad}',
		'dominoes_stripe' 	=> '{$Duration:2000,y:-1,$Delay:60,$Cols:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$JssorEasing$.$EaseOutJump,$Round:{$Top:1.5}}',
		'wave_in' 			=> '{$Duration:1500,y:-0.5,$Delay:60,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:$JssorEasing$.$EaseInWave,$Round:{$Top:1.5}}'
	);

	$transitions_list = apply_filters('wisme_transition_params_list',$transitions_list);

	if(isset($transitions_list[$key])){
		return $transitions_list[$key];
	}else{
		return $transitions_list['fade'];
	}
}



function wisme_transitions(){
	$transitions_list = array(
		'fade' 				=> __('Fade','wisme'),
		'fade_in_l' 		=> __('Fade In Left','wisme'),
		'fade_in_r' 		=> __('Fade In Right','wisme'),
		'fade_in_t' 		=> __('Fade In Top','wisme'),
		'fade_in_b' 		=> __('Fade In Bottom','wisme'),				
		'fade_in_lr_chess'  => __('Fade In Left-Right Chess','wisme'),
		'fade_in_tb_chess'  => __('Fade In Top-Bottom Chess','wisme'),
		'fade_out_l' 		=> __('Fade Out Left','wisme'),
		'fade_out_r' 		=> __('Fade Out Right','wisme'),
		'fade_out_t' 		=> __('Fade Out Top','wisme'),
		'fade_out_b' 		=> __('Fade Out Bottom','wisme'),
		'fade_out_lr_chess' => __('Fade Out Left-Right Chess','wisme'),
		'fade_out_tb_chess' => __('Fade Out Top-Bottom Chess','wisme'),
		'fade_out_corners' => __('Fade Out Corners','wisme'),
		'fade_fly_in_l' => __('Fade Fly In Left','wisme'),
		'fade_fly_in_r' => __('Fade Fly In Right','wisme'),
		'fade_fly_in_t' => __('Fade Fly In Top','wisme'),
		'fade_fly_in_b' => __('Fade Fly In Bottom','wisme'),
		'fade_fly_in_lr' => __('Fade Fly In Left-Right','wisme'),
		'fade_fly_in_lr_chess' => __('Fade Fly In Left-Right Chess','wisme'),
		'fade_fly_in_tb' => __('Fade Fly In Top-Bottom','wisme'),
		'swing_inside_in_stairs' => __('Swing Inside In Stairs','wisme'),
		'swing_inside_in_square' => __('Swing Inside In Square','wisme'),
		'swing_inside_in_random' => __('Swing Inside In Random','wisme'),
		'swing_outside_in_stairs' => __('Swing Outside In Stairs','wisme'),
		'swing_outside_in_square' => __('Swing Outside In Square','wisme'),
		'swing_outside_in_random' => __('Swing Outside In Random','wisme'),
		'swing_outside_out_stairs' => __('Swing Outside Out Stairs','wisme'),
		'swing_outside_out_square' => __('Swing Outside Out Square','wisme'),
		'swing_outside_out_random' => __('Swing Outside Out Random','wisme'),
		'zoom_plus_in' => __('Zoom Plus In','wisme'),
		'zoom_plus_in_l' => __('Zoom Plus Left','wisme'),
		'zoom_plus_in_r' => __('Zoom Plus Right','wisme'),
		'zoom_plus_in_t' => __('Zoom Plus Top','wisme'),
		'zoom_plus_in_b' => __('Zoom Plus Bottom','wisme'),
		'zoom_plus_in_tl' => __('Zoom Plus Top-Left','wisme'),
		'zoom_plus_in_tr' => __('Zoom Plus Top-Right','wisme'),
		'zoom_plus_in_bl' => __('Zoom Plus Bottom-Left','wisme'),
		'zoom_plus_in_br' => __('Zoom Plus Bottom-Right','wisme'),		
		'zoom_plus_out' => __('Zoom Plus Out ','wisme'),
		'zoom_plus_out_l' => __('Zoom Plus Out Left','wisme'),
		'zoom_plus_out_r' => __('Zoom Plus Out Right','wisme'),
		'zoom_plus_out_t' => __('Zoom Plus Out Top','wisme'),
		'zoom_plus_out_b' => __('Zoom Plus Out Bottom','wisme'),
		'zoom_plus_out_tl' => __('Zoom Plus Out Top-Left','wisme'),
		'zoom_plus_out_tr' => __('Zoom Plus Out Top-Right','wisme'),
		'zoom_plus_out_bl' => __('Zoom Plus Out Bottom-Left','wisme'),
		'zoom_plus_out_br' => __('Zoom Plus Out Bottom-Right','wisme'),
		'zoom_minus_in' => __('Zoom Minus In','wisme'),
		'zoom_minus_in_l' => __('Zoom Minus In Left','wisme'),
		'zoom_minus_in_r' => __('Zoom Minus In Right','wisme'),
		'zoom_minus_in_t' => __('Zoom Minus In Top','wisme'),
		'zoom_minus_in_b' => __('Zoom Minus In Bottom','wisme'),
		'zoom_minus_in_tl' => __('Zoom Minus In Top-Left','wisme'),
		'zoom_minus_in_tr' => __('Zoom Minus In Top-Right','wisme'),
		'zoom_minus_in_bl' => __('Zoom Minus In Bottom-Left','wisme'),
		'zoom_minus_in_br' => __('Zoom Minus In Bottom-Right','wisme'),		
		'zoom_minus_out' => __('Zoom Minus Out','wisme'),
		'rotate_v_double_plus_in' => __('Rotate Vertical Double Plus In','wisme'),
		'rotate_h_double_plus_in' => __('Rotate Horizontal Double Plus In','wisme'),
		'rotate_v_double_minus_in' => __('Rotate Vertical Double Minus In','wisme'),
		'rotate_h_double_minus_in' => __('Rotate Horizontal Double Minus In','wisme'),
		'rotate_v_double_plus_out' => __('Rotate Vertical Double Plus Out','wisme'),
		'rotate_h_double_plus_out' => __('Rotate Horizontal Double Plus Out','wisme'),
		'rotate_v_double_minus_out' => __('Rotate Vertical Double Minus Out','wisme'),
		'rotate_h_double_minus_out' => __('Rotate Horizontal Double Minus Out','wisme'),
		'rotate_v_fork_plus_in' => __('Rotate Vertical Fork Plus In','wisme'),
		'rotate_h_fork_plus_in' => __('Rotate Horizontal Fork Plus In','wisme'),
		'rotate_v_fork_plus_out' => __('Rotate Vertical Fork Plus Out','wisme'),
		'rotate_h_fork_plus_out' => __('Rotate Horizontal Fork Plus Out','wisme'),
		'rotate_zoom_plus_in' => __('Rotate Zoom Plus In','wisme'),
		'rotate_zoom_plus_in_l' => __('Rotate Zoom Plus In Left','wisme'),
		'rotate_zoom_plus_in_r' => __('Rotate Zoom Plus In Right','wisme'),
		'rotate_zoom_plus_in_t' => __('Rotate Zoom Plus In Top','wisme'),
		'rotate_zoom_plus_in_b' => __('Rotate Zoom Plus In Bottom','wisme'),
		'rotate_zoom_plus_in_tl' => __('Rotate Zoom Plus In Top-Left','wisme'),
		'rotate_zoom_plus_in_tr' => __('Rotate Zoom Plus In Top-Right','wisme'),
		'rotate_zoom_plus_in_bl' => __('Rotate Zoom Plus In Bottom-Left','wisme'),
		'rotate_zoom_plus_in_br' => __('Rotate Zoom Plus In Bottom-Right','wisme'),
		'jump_in_straight' => __('Jump In Straight','wisme'),
		'jump_in_swirl' => __('Jump In Swirl','wisme'),
		'jump_in_zigzag' => __('Jump In Zigzag','wisme'),
		'jump_in_square' => __('Jump In Square','wisme'),
		'jump_in_circle' => __('Jump In Circle','wisme'),
		'jump_in_square_chess' => __('Jump In Square Chess','wisme'),
		'jump_in_rectangle' => __('Jump In Rectangle','wisme'),
		'jump_in_rectangle_cross' => __('Jump In Rectangle Cross','wisme'),
		'jump_out_straight' => __('Jump Out Straight','wisme'),
		'jump_out_swirl' => __('Jump Out Swirl','wisme'),
		'jump_out_zigzag' => __('Jump Out Zigzag','wisme'),
		'jump_out_square' => __('Jump Out Square','wisme'),
		'jump_out_circle' => __('Jump Out Circle','wisme'),
		'jump_out_square_chess' => __('Jump Out Square Chess','wisme'),
		'jump_out_rectangle' => __('Jump Out Rectangle','wisme'),
		'jump_out_rectangle_cross' => __('Jump Out Rectangle Cross','wisme'),
		'flutter_inside_in' => __('Flutter Inside In','wisme'),
		'collapse_stairs' 	=> __('Collapse Stairs','wisme'),
		'expand_stairs' 	=> __('Expand Stairs','wisme'),
		'dominoes_stripe' 	=> __('Dominoes Stripe','wisme'),
		'wave_in' 			=> __('Wave In','wisme'),
	);

	$transitions_list = apply_filters('wisme_transitions_list',$transitions_list);

	return $transitions_list;
}


function wisme_display_donation_block(){
    $display = '<div class="wisme_donation_box">
                <div style="    float: left;
    width: 80%;font-size:14px;
    line-height: 25px;">Impressive Slider Made Easy is offered as a free plugin. Please consider a small $1 donation to continue the development and support of this plugin and keep it alive.</div>
                
                <div style="float:left">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input name="cmd" type="hidden" value="_s-xclick" />
                
                    <input name="hosted_button_id" type="hidden" value="C8RF32ZZW6PVL" />
                    <input alt="PayPal — The safer, easier way to pay online." name="submit" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donateCC_LG.gif" type="image" />
                    <img src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" alt="" width="1" height="1" border="0" /></form>
                </div>
                <div style="clear:both"></div>
                </div>';
    return $display;
}