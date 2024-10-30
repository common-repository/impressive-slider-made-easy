<?php
	global $wisme,$wisme_slider_params;
	extract($wisme_slider_params);
?>

<script type='text/javascript'>
    jQuery(document).ready(function   ($) {

        var jssor_SlideshowTransitions = [<?php echo $transition_effect; ?>];

   
        var jssor_options = {
          $AutoPlay: <?php echo $auto_play; ?>,
          
          $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_SlideshowTransitions,
            $TransitionsOrder: 1
          },
          $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
            $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
            $AutoCenter: 0,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
            $Steps: 1 
          },
          
          <?php echo $additional_options; ?>
        };

        if($('.wisme-slider-active').length == 1){
            var jssor_slider = new $JssorSlider$('<?php echo "wisme-slider-container-".$post_id; ?>', jssor_options);
            wisme_responsive_ScaleSlider();

            //Scale slider while window load/resize/orientationchange.
            $(window).bind("load", wisme_responsive_ScaleSlider);
            $(window).bind("resize", wisme_responsive_ScaleSlider);
            $(window).bind("orientationchange", wisme_responsive_ScaleSlider);
            
        }
        
        function wisme_responsive_ScaleSlider() {
            //console.log($('#<?php echo "wisme-slider-container-".$post_id; ?>'));
            var parentWidth = $('#<?php echo "wisme-slider-container-".$post_id; ?>').parent().width();
            if (parentWidth) {
                jssor_slider.$ScaleWidth(parentWidth);
            }
            else
                window.setTimeout(wisme_responsive_ScaleSlider, 30);
        }
        //Scale slider after document ready
                                        
        
    });
</script>
