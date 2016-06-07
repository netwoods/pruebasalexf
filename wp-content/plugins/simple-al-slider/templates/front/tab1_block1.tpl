<?php
   $unq = "positions_".uniqid();
   
if(!function_exists("bust_imgs_in_container")) {  
function bust_imgs_in_container($source, $counting, $slnum, $unq, $txkey, $container_templates_scripts, $is_lazy_load)
  {

    $counting_img = substr_count($source, '<img');

        $uniqid = "tmpl_".uniqid();
        $output = "<div class='".$uniqid." ins_template'>";
    
    $counting_css = $counting + $counting_img;
    if ($is_lazy_load)
    {
    $source = preg_replace("/(<img([^>]*?))src=/im", "\\1 src='".plugins_url("../../images/empty.gif", __FILE__)."' data-src=", $source);
    preg_match_all("/url\([\'\"]([^\"\']+)[\'\"]\)/im", $source, $matches);
    $match_result = "";
    foreach ($matches[1] as $match)
      {
      $counting_css++;
      $match_result .= "window.loaded_slides_imgs['".$unq."'][".$slnum."].push([\"simple_al_imgs_csstempl_".$unq."_\"+".$counting_css.", \"".$match."\", \"#simple_al_item_".$unq."_".$slnum."\", \"not_set\"]);";
      }
     }
    $output .= $source;
   $container_templates_scripts .= "
   <script>
   if (simplal_fl == undefined)var simplal_fl = [];
   if (simplal_fl['".$unq."'] == undefined) simplal_fl['".$unq."'] = [];
   
   if (simplal_fl['".$unq."']['".$txkey."'] == undefined) simplal_fl['".$unq."']['".$txkey."'] = true;   
   jQuery(function($) {
   function one_time_template()
    {
   ".$match_result."
    $('.".$uniqid."').find('img').each(function(i,v){

      window.loaded_slides_imgs['".$unq."'][".$slnum."].push([\"simple_al_imgs_templ_".$unq."_\"+(".$counting."+i), $(v).attr('data-src'), \"#simple_al_item_".$unq."_".$slnum."\", \"set\"]);
      $(v).addClass(\"simple_al_imgs_templ_".$unq."_\"+(".$counting."+i));
    });
    }
    if (simplal_fl['".$unq."']['".$txkey."']) { one_time_template();simplal_fl['".$unq."']['".$txkey."']=false; }
   });
   </script>
   ";
        $output .= "</div>";

   
    return array($counting_css, $output, $container_templates_scripts);
  }
}
?>
<script>
    if (window.not_need_lazy_load == undefined)window.not_need_lazy_load = [];
    
if (document.images)
  (new Image()).src = '<?php echo plugins_url("../../images/preloader2.gif", __FILE__); ?>';
  
  if (window.loaded_slides_imgs == undefined)window.loaded_slides_imgs = [];
  window.loaded_slides_imgs['<?php echo $unq; ?>'] = [];
  
  if (window.slides_nums == undefined)window.slides_nums = [];
  window.slides_nums['<?php echo $unq; ?>'] = [];
</script>


<div id="simple_al_slider_outter_<?php echo $unq; ?>" class="simple_al_slider_outter simple_al_slider_outter_<?php echo $unq; ?>" style="width:100%;height:100%;opacity:0;-moz-opacity:0;-khtml-opacity:0;">

    <?php
      if ($front['slider']['mask_file'] == 'none')
      {
      ?>
  <div class="simple_al_preloader simple-al-no-flick" id="simple_al_preloader_<?php echo $unq; ?>" style="position:relative;left:0px;top:0px;width:100%;height:100%;background-color:#000000;display:table;z-index:1220000;">
    <div class="simple_al_preloader_inside simple-al-no-flick" style="display:table-cell;vertical-align:middle;text-align:center;">
      <img alt="Preloader" src="<?php echo plugins_url("../../images/empty.gif", __FILE__); ?>" class="preloaded_image simple-al-no-flick" id="preloaded_image_<?php echo $unq; ?>" style="width:100px;">
    </div>
  </div>
      <?php
      }
      else
      {
      ?>
<div class="simple_al_preloader" id="simple_al_preloader_<?php echo $unq; ?>" style="position:relative;left:0px;top:0px;width:100%;height:100%;display:table;z-index:12000;">
<div class="simpleal_preload_outter_<?php echo $unq; ?>">
  <svg width="<?php echo $front['slider']['sldrwidth']; ?>" height="<?php echo $front['slider']['sldrheight']; ?>">

<rect x="0" y="0" width="<?php echo $front['slider']['sldrwidth']; ?>" height="<?php echo $front['slider']['sldrheight']; ?>" style="fill:black;mask:url(#slideMask);"/>
    <image x="<?php echo $front['slider']['sldrwidth']/2-100/2; ?>" y="<?php echo $front['slider']['sldrheight']/2-50/2; ?>" xlink:href="<?php echo plugins_url("../../images/preloader2.gif", __FILE__); ?>" width="100" height="50" style="" />

  </svg>
</div>
</div>

      <?php
      }
      ?>

<div id="simple_al_slider_id_<?php echo $unq; ?>" class="simple-al-no-flick simple_al_slider" style="position:relative;"><!-- style='width:<?php echo $front['slider']['sldrwidth']; ?>px;height:<?php echo $front['slider']['sldrheight']; ?>px;overflow:hidden;position:relative;'>-->

<style scoped>
<?php echo stripslashes($front['slider']['apply_classes']); ?>
</style>

<div id="slides_indicator_<?php echo $unq; ?>" class="simple-al-no-flick slides_indicator" style="position:absolute;z-index:1000;"></div>
<div id="slides_arrows_<?php echo $unq; ?>" class="slides_arrows" style="position:absolute;z-index:1000;"></div>
<div style="position:absolute;left:0px;top:0px;z-index:10;" class="simple-al-no-flick">
<div class="simple-al-no-flick simple_al_slider_inside" id="simple_al_slider_inside_<?php echo $unq; ?>" style='width:<?php echo $front['slider']['sldrwidth']; ?>px;height:<?php echo $front['slider']['sldrheight']; ?>px;overflow:hidden;'>

<?php
$parent_params = $front['slider']['sldrwidth'].", ".$front['slider']['sldrheight'];
    $fullscreen = $front['slider']['fullscreen'];

  $txtnum = 0;
      $counting = 0;
    $positions_output = "{";
    $counter_templates_imgs = 0;
    
    $container_main_script = "";
        $container_children_scripts = "";
        
if (isset($front['slides_info'])&&(!empty($front['slides_info'])))
  foreach ($front['slides_info'] as $slnum=>$slide)
  {
    $subslnum = $slnum*2 - 1;
    $positions_output .= "simple_al_item_".$unq."_".$slnum.":{";
      $counting++;
    ?>
    <?php
    $container_main_script .= "
    <script>
    if (simplal_fl_bg == undefined)var simplal_fl_bg = [];
    if (simplal_fl_bg['".$unq."'] == undefined) simplal_fl_bg['".$unq."'] = [];
    if (simplal_fl_bg['".$unq."'][".$slnum."] == undefined) simplal_fl_bg['".$unq."'][".$slnum."] = true;

    function one_time_bg()
    {
    window.slides_nums['".$unq."'].push(".$slnum.");
    if (window.loaded_slides_imgs['".$unq."'][".$slnum."] == undefined)window.loaded_slides_imgs['".$unq."'][".$slnum."] = [];

      window.loaded_slides_imgs['".$unq."'][".$slnum."].push([\"simple_al_bgs_".$unq."_".$counting."\", \"".$slide['imgs']['imgimage']."\", \"#simple_al_item_".$unq."_".$slnum."\", \"set\"]);
    }
        if (simplal_fl_bg['".$unq."'][".$slnum."]) { one_time_bg();simplal_fl_bg['".$unq."'][".$slnum."]=false; }
    </script>
    ";
    ?>
  <div class="simple-al-no-flick simple_al_item simple_al_item_<?php echo $unq; ?> <?php echo ($front['slider']['mask_file'] == 'none') ? "" : "simpleal_loaded"; ?>" id="simple_al_item_<?php echo $unq; ?>_<?php echo $slnum; ?>">
    <div class="simple-al-no-flick simple_al_subitem" id="simple_al_subitem_<?php echo $unq; ?>_<?php echo $subslnum; ?>">
      <?php
      if ($front['slider']['mask_file'] == 'none')
        {
      ?>
          <img alt="<?php echo $slide['imgs']['imgname']; ?>" class="simple-al-no-flick simple_al_bgs_<?php echo $unq; ?>_<?php echo $counting; ?>" src="<?php echo plugins_url("../../images/empty.gif", __FILE__); ?>" style='width:<?php echo $front['slider']['sldrwidth']; ?>px;height:<?php echo $front['slider']['sldrheight']; ?>px;'>
      <?php
        }
        else
        {
      ?>
<!--<div class="simpleal_outter simple-al-no-flick">-->
<svg width="<?php echo $front['slider']['sldrwidth']; ?>" height="<?php echo $front['slider']['sldrheight']; ?>">

<image x="0" y="0" xlink:href="<?php echo $slide['imgs']['imgimage']; ?>" width="<?php echo $front['slider']['sldrwidth']; ?>" height="<?php echo $front['slider']['sldrheight']; ?>" style="mask:url(#slideMask);" />

</svg>
<!--</div>-->

      <?php
        }
      ?>
    </div>
    <div class="simple_al_subitem txt_container" id="simple_al_subitem_<?php echo $unq; ?>_<?php echo ($subslnum+1); ?>">
    <?php
    $i = 0;
    if (isset($slide['texts'])&&(!empty($slide['texts'])))
    foreach ($slide['texts'] as $txkey=>$txt)
    {
      $txtnum++;
      $positions_output_addit = ($i == 0) ? "" : ",";
      $positions_output .= $positions_output_addit . "simple_al_subitem_txt_".$unq."_".$txtnum.":[".$txt['offsetleft'].", ".$txt['offsettop']."]";
      $i++;
    ?>

      <?php
     if (isset($txt['txttype']))
      {
     switch ($txt['txttype'])
        {
      case 0:
     if ((isset($txt['txturl']))&&(!empty($txt['txturl'])))
      echo "<a href='".$txt['txturl']."'>";
      ?>

      <div class="simple_al_subitem_txt <?php echo $txt['classes']; ?>" id="simple_al_subitem_txt_<?php echo $unq; ?>_<?php echo $txtnum; ?>" style="background-color:<?php echo $txt['bgcolor']; ?>;color:<?php echo $txt['color']; ?>;width:<?php echo $txt['txtwidth']; ?>px;height:<?php echo $txt['txtheight']; ?>px;font-size:<?php echo $txt['size']; ?>pt;display:none;position:absolute;left:0px;top:0px;<?php echo $txt['style']; ?>">
        <?php echo stripslashes($txt['text']); ?>
      </div>
        <?php
     if ((isset($txt['txturl']))&&(!empty($txt['txturl'])))
          echo "</a>";
          break;
          
      case 1:
     if ((isset($txt['txturl']))&&(!empty($txt['txturl'])))
      echo "<a href='".$txt['txturl']."'>";
      ?>
      <?php
            $counting++;
      ?>
    <?php
    $container_children_scripts .= "
    <script>
    if (simplal_fl_img == undefined)var simplal_fl_img = [];
    if (simplal_fl_img['".$unq."'] == undefined)simplal_fl_img['".$unq."'] = [];
        
    if (simplal_fl_img['".$unq."']['".$txkey."'] == undefined)simplal_fl_img['".$unq."']['".$txkey."'] = true;
    function one_time_img()
    {
      window.loaded_slides_imgs['".$unq."'][".$slnum."].push([\"simple_al_imgs_".$unq."_".$counting."\", \"".stripslashes($txt['txtimage'])."\", \"#simple_al_item_".$unq."_".$slnum."\", \"set\"]);
    }
            if (simplal_fl_img['".$unq."']['".$txkey."']) { one_time_img();simplal_fl_img['".$unq."']['".$txkey."']=false; }
           
    </script>
    ";
    ?>
      <div class="simple-al-no-flick simple_al_subitem_txt <?php echo $txt['classes']; ?>" id="simple_al_subitem_txt_<?php echo $unq; ?>_<?php echo $txtnum; ?>" style="background-color:<?php echo $txt['bgcolor']; ?>;color:<?php echo $txt['color']; ?>;width:<?php echo $txt['txtwidth']; ?>px;height:<?php echo $txt['txtheight']; ?>px;font-size:<?php echo $txt['size']; ?>pt;display:none;position:absolute;left:0px;top:0px;<?php echo $txt['style']; ?>">
    <?php
       if ($front['slider']['mask_file'] == 'none')
        {
    ?>
        <img alt="<?php echo $txt['text']; ?>" src="<?php echo plugins_url("../../images/empty.gif", __FILE__); ?>" class="simple_al_imgs_<?php echo $unq; ?>_<?php echo $counting; ?>" width="<?php echo $txt['txtwidth']; ?>" height="<?php echo $txt['txtheight']; ?>" style="width:<?php echo $txt['txtwidth']; ?>px;height:<?php echo $txt['txtheight']; ?>px;">
     <?php
        }
        else
        {
     ?>
        <img alt="<?php echo $txt['text']; ?>" src="<?php echo stripslashes($txt['txtimage']); ?>" class="simple_al_imgs_<?php echo $unq; ?>_<?php echo $counting; ?>" style="width:<?php echo $txt['txtwidth']; ?>px;height:<?php echo $txt['txtheight']; ?>px;">
     <?php
        }
     ?>
      </div>
        <?php
     if ((isset($txt['txturl']))&&(!empty($txt['txturl'])))
          echo "</a>";
          break;

      case 2:
     if ((isset($txt['txturl']))&&(!empty($txt['txturl'])))
      echo "<a href='".$txt['txturl']."'>";
      ?>

      <div class="simple-al-no-flick simple_al_subitem_txt <?php echo $txt['classes']; ?>" id="simple_al_subitem_txt_<?php echo $unq; ?>_<?php echo $txtnum; ?>" style="background-color:<?php echo $txt['bgcolor']; ?>;color:<?php echo $txt['color']; ?>;width:<?php echo $txt['txtwidth']; ?>px;height:<?php echo $txt['txtheight']; ?>px;font-size:<?php echo $txt['size']; ?>pt;display:none;position:absolute;left:0px;top:0px;<?php echo $txt['style']; ?>">
      <?php 
      if ((isset($txt['template']))&&(!empty($txt['template']))&&($txt['template'] != 'none'))
        {
        $source = file_get_contents(plugin_dir_path( __FILE__ )."../../templates/front_templates/".$txt['template']);
        list($counter_templates_imgs, $templates_output, $container_templates_scripts) = bust_imgs_in_container($source, $counter_templates_imgs, $slnum, $unq, $txkey, $container_templates_scripts, ($front['slider']['mask_file'] == 'none')); 
          echo $templates_output;
        }
        ?>
      </div>
        <?php
     if ((isset($txt['txturl']))&&(!empty($txt['txturl'])))
          echo "</a>";
          break;

        ?>

      <?php
        }
      }
    }
    $positions_output .= "},";
      ?>
    </div>
  </div>
      <?php
  }
  $positions_output = substr($positions_output, 0, -1);
  $positions_output .= "}";

?>
</div>
</div>
</div>
<?php
if ($front['slider']['mask_file'] == 'none')  
  {
  if ((isset($container_main_script))&&(!empty($container_main_script)))echo $container_main_script;
  if ((isset($container_children_scripts))&&(!empty($container_children_scripts)))echo $container_children_scripts;
  if ((isset($container_templates_scripts))&&(!empty($container_templates_scripts)))echo $container_templates_scripts;
  }
  else
  {
  ?>
    <script>
    window.not_need_lazy_load['<?php echo $unq; ?>'] = true;
    </script>
    <?php
  }
      ?>


 <?php
  if ($front['slider']['mask_file'] != 'none')
  {
?>
<div style="position:absolute;left:0px;top:0px;z-index:-10;">
<svg>
<mask id="slideMask">
    <image class="simple-al-no-flick" x="0" y="0" xlink:href="<?php echo plugin_dir_url( __FILE__ )."../../templates/front_masks/".$front['slider']['mask_file']; ?>" width="<?php echo $front['slider']['sldrwidth']; ?>" height="<?php echo $front['slider']['sldrheight']; ?>" />
</mask>
</svg>
</div>
 <?php
 }
 ?>

</div>
<div class="class_for_out_styles_<?php echo $unq; ?>">
</div>
<div class="class_for_out_styles_sequence_<?php echo $unq; ?>">
</div>
<div class="for_lazy_load_<?php echo $unq; ?>" style="">
</div>

<div class="imgs_garbage_<?php echo $unq; ?>" style="display:none;">
<img alt="load1" src="<?php echo plugins_url("../../images/preloader2.gif", __FILE__); ?>">
<img alt="load2" src="<?php echo plugins_url("../../images/arrow_left_0".$front['slider']['settings_buttons'].".png", __FILE__); ?>">
<img alt="load3" src="<?php echo plugins_url("../../images/arrow_right_0".$front['slider']['settings_buttons'].".png", __FILE__); ?>">

<img alt="load4" src="<?php echo plugins_url("../../images/slide_filled_0".$front['slider']['settings_indicators'].".png", __FILE__); ?>">
<img alt="load5" src="<?php echo plugins_url("../../images/slide_empty_0".$front['slider']['settings_indicators'].".png", __FILE__); ?>">

<img alt="load6" src="<?php echo plugins_url("../../images/slide_more_left.png", __FILE__); ?>">
<img alt="load7" src="<?php echo plugins_url("../../images/slide_more_right.png", __FILE__); ?>">
</div>

<script>

if (window.cont_width_curr === undefined) window.cont_width_curr = [];
      window.cont_width_curr['<?php echo $unq; ?>'] = jQuery('.simple_al_slider_outter_<?php echo $unq; ?>').parent().innerWidth();

if (0 != <?php echo $fullscreen; ?>)
  {
    jQuery('.simple_al_slider_outter_<?php echo $unq; ?>').innerWidth(jQuery('.simple_al_slider_outter_<?php echo $unq; ?>').parent().innerWidth());
      jQuery('.simple_al_slider_outter_<?php echo $unq; ?>').innerHeight(jQuery('.simple_al_slider_outter_<?php echo $unq; ?>').parent().innerWidth()*<?php echo $front['slider']['sldrheight']; ?>/<?php echo $front['slider']['sldrwidth']; ?>);
  }
  else
  {
    jQuery('.simple_al_slider_outter_<?php echo $unq; ?>').innerWidth(<?php echo $front['slider']['sldrwidth']; ?>);
      jQuery('.simple_al_slider_outter_<?php echo $unq; ?>').innerHeight(<?php echo $front['slider']['sldrheight']; ?>);
  }
    jQuery('.simple_al_slider_outter_<?php echo $unq; ?>').css('overflow', 'hidden');

jQuery(function($) {

  if (window.simple_al_slider_blur === undefined)
    window.simple_al_slider_blur = false;

  if (window.simple_al_slider_pos === undefined)
    window.simple_al_slider_pos = [];

  if (window.simple_al_slider === undefined)
  {
    window.simple_al_slider = [];
  }

  if (window.resize_execution_flag === undefined)  
              window.resize_execution_flag = true;

  if (window.action_finished == undefined)
            window.action_finished = [];
            window.action_finished['<?php echo $unq; ?>'] = false;

      window.simple_al_slider_pos['<?php echo $unq; ?>'] = <?php echo $positions_output; ?>;
<?php

?>      
      window.simple_al_slider.push($('#simple_al_slider_inside_<?php echo $unq; ?>').simple_al_slider({container_id:$('#simple_al_slider_inside_'+'<?php echo $unq; ?>'),fullscreen:<?php echo $fullscreen; ?>, parent_params:[<?php echo $parent_params; ?>], positions : window.simple_al_slider_pos['<?php echo $unq; ?>'],direction:'<?php echo $front['slider']['effect_direction']; ?>', duration_action:<?php echo $front['slider']['duration']; ?>, duration_effect:<?php echo $front['slider']['duration_effect']; ?>, duration_text_effect:<?php echo $front['slider']['duration_text_effect']; ?>, action:'<?php echo $front['slider']['effect']; ?>', set_buttons: <?php echo $front['slider']['settings_buttons']; ?>, set_top_buttons: <?php echo $front['slider']['settings_buttons_top']; ?>, set_width_buttons: <?php echo $front['slider']['settings_buttons_width']; ?>, set_opacity_buttons: <?php echo $front['slider']['settings_buttons_opacity']; ?>, frame:'parent', uniqid:'<?php echo $unq; ?>', indicators_num:<?php echo $front['slider']['settings_indicators']; ?>, indicators_width:<?php echo $front['slider']['settings_indicators_width']; ?>, indicators_top:<?php echo $front['slider']['settings_indicators_top']; ?>, slide_indicators_front_one_side : <?php echo $front['slider']['settings_num_indicators']; ?>, autoplay:<?php echo $front['slider']['autoplay']; ?>}));
    

if ((wsbi == undefined)||(window.slide_by_index == undefined))
  var wsbi = window.slide_by_index = function(unq, ind)
    {
       $.each(window.simple_al_slider, function (i, v){ 
       
        if (v.uniqid == unq)
          {
            v.slide_to_position(ind);
          }
       
       });

    }
$.fn.simple_al_slider_base.add_indexOf();

if (window.not_need_lazy_load['<?php echo $unq; ?>'] != true)
 {
//Preloader Image Load
var image = new Image();
image.onload = function () {
var myElement = document.getElementById("simple_al_slider_outter_<?php echo $unq; ?>");
  myElement.style.opacity = 1;
  document.getElementById('preloaded_image_<?php echo $unq; ?>').src = '<?php echo plugins_url("../../images/preloader2.gif", __FILE__); ?>';

if (window.loaded_slides != undefined)
  window.loaded_slides(window.slides_nums['<?php echo $unq; ?>'][0], true);
  else
  wsbi('<?php echo $unq; ?>', window.slides_nums['<?php echo $unq; ?>'][0]);
}
image.onerror = function () {
   console.error("Incorret image loading");
}
image.src = '<?php echo plugins_url("../../images/preloader2.gif", __FILE__); ?>';
 }
 else
 {
var myElement = document.getElementById("simple_al_slider_outter_<?php echo $unq; ?>");
  myElement.style.opacity = 1;
 }

    $(window).on("blur focus", function(e) {

    var prevType = $(this).data("prevType");

        switch (e.type) {
            case "blur":
            window.simple_al_slider_blur = true;
            $.each(window.simple_al_slider, function (i, v) {
                v.stop();
            });
                break;
            case "focus":
            if (window.simple_al_slider_blur)
              {
            $.each(window.simple_al_slider, function(i, v){
                v.start();
                });
                window.simple_al_slider_blur = false;
              }
                break; 
        }

      $(this).data("prevType", e.type);
    });

    //variables to confirm window height and width
    var lastWindowHeight = 0;
    var lastWindowWidth = 0;
    
    $( window ).on("resize", function() {
//confirm window was actually resized
        if($(window).height()!=lastWindowHeight || $(window).width()!=lastWindowWidth){

            //set this windows size
            lastWindowHeight = $(window).height();
            lastWindowWidth = $(window).width();
       true_resize();
       }
    });
  
  var true_resize = function()
    {
       $.each(window.simple_al_slider, function (i, v){ v.resize(); });
       $('.simple_al_slider_outter_<?php echo $unq; ?>').find('img').filter(function(){ return $(this).css('max-width') == '100%' }).css('max-width', 'inherit');
    }
  
  var window_resize_flag = false;
    if (!window_resize_flag)
        {
         $('.simple_al_slider_outter_<?php echo $unq; ?>').css('width', '');
         $('.simple_al_slider_outter_<?php echo $unq; ?>').css('height', '');
          $( window ).trigger("resize");
              var window_resize_flag = true;
        }
  });
</script>
