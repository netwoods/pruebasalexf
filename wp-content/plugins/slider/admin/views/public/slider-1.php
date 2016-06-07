<div style="width:<?php echo esc_attr($slider_options['width']) ?>px;height:<?php echo esc_attr($slider_options['height']) ?>px;" class="parentlayerslidercont">
<div data-slider_options="<?php echo esc_attr(json_encode( $slider_options )); ?>" class="slider-pro wprlslayerslider" id="slider<?php echo esc_attr($slider_id) ?>" data-sliderid="<?php echo $slider_id ?>">
    <div class="sp-slides">
    	<?php foreach ( $slides as $index => $slide ): ?>
        
        <div class="sp-slide sp-slide<?php echo $index ?>" data-slideid="<?php echo $slider_id . $index+1; ?>" data-slideduration="<?php echo esc_attr($slide['slideduration']) ?>" data-transduration="<?php echo esc_attr($slide['transduration']) ?>">
            <img class="sp-image" src="<?php echo esc_url($slide['bgimage']) ?>" />

            <?php foreach ( $slide['layers'] as $lindex => $layer ): ?>
            
            <div class="sp-layer sp-layertext sp-layerindex<?php echo $lindex ?> sp-layer<?php echo $index+1 . $lindex+1; ?>" data-layerid="<?php echo $index+1 . $lindex+1; ?>" data-slideid="<?php echo $slider_id . $index+1; ?>" data-sliderid="<?php echo $slider_id ?>" data-layer-init="1" data-delay="<?php echo esc_attr($layer['animationdelay'])  ?>" data-animation="<?php echo esc_attr($layer['animation']) ?>" style="position:absolute;top:<?php echo esc_attr($layer['top']) ?>px;left:<?php echo esc_attr($layer['left']) ?>px;background-color: <?php echo esc_attr($layer['bgcolor']) ?>;color:<?php echo esc_attr($layer['tcolor']) ?>;font-size:<?php echo esc_attr($layer['tsize']) ?>px;width:<?php echo esc_attr($layer['width']) ?>px;height:<?php echo esc_attr($layer['height']) ?>px;"><?php echo esc_html($layer['tcontent']) ?></div>

            <?php endforeach; ?>
        </div>

    	<?php endforeach; ?>
    </div>
</div>
</div>