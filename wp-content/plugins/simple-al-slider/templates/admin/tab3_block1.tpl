<h2><?php echo $lang[$current_language]['Background Images']['Background Images']; ?></h2>
<p style="">* <?php echo $lang[$current_language]['Background Images']['Background Images Alt Notice']; ?></p>

<div class='images_output_area'>
<?php
if (isset($slider['slides_info'])&&(!empty($slider['slides_info'])))
foreach ($slider['slides_info'] as $slide)
 {
if (isset($slide['imgs'])&&(!empty($slide['imgs'])))
  foreach ($slide['imgs'] as $image)
  {
  ?>
  <div class='image_container'>
  <form method="POST" id="image_frm_<?php echo $image['imgid']; ?>" class="image_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=2&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>&amp;updated=true">
        <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_bg_image');
    }
  ?>
<div class="panel panel-primary inner_div_bg_frm">
<div class="panel-heading">
<?php
  $slide_caption = (empty($slide['sldsname'])) ? $lang[$current_language]['Slides']['Slide']." (id:".$slide['sldsid'].")" : $lang[$current_language]['Slides']['Slide']." (".$lang[$current_language]['Slides']['Name'].":".$slide['sldsname'].")";
  $img_caption = (empty($image['imgname'])) ? $lang[$current_language]['Background Images']['BG Image for']." ".$slide_caption : $image['imgname']." ".$lang[$current_language]['Background Images']['for']." ".$slide_caption;
?>
  <h3 class="panel-title"><?php echo $img_caption; ?></h3>
  
      </div>
<div class="panel-body">

  <input type='hidden' name='image_id[]' value='<?php echo $image['imgid']; ?>'>
    <div class='image_show'>
      <div class="left_line">
      <table>
      
      <tr>
      <td>
      <?php echo $lang[$current_language]['Background Images']['Name']; ?>
      </td>
      <td>
      <input type="text" name="image_name[]" size="30" value="<?php echo $image['imgname']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Background Images']['URL']; ?>
      </td>
      <td>
      <input type="text" name="url[]" size="30" value="<?php echo $image['imgurl']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Background Images']['Image File']; ?>
      </td>
      <td>
      <input type="text" name="image[]" size="50" value="<?php echo $image['imgimage']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Background Images']['Actions']; ?>
      </td>
      <td>
      <input type="submit" name="save_image_btn" value="<?php echo $lang[$current_language]['Background Images'][' Save Image ']; ?>">
      <input type="submit" name="del_image_btn" value="<?php echo $lang[$current_language]['Background Images'][' Delete Image ']; ?>">
      </td>
      </tr>
      
      </table>
      <input type="hidden" name="image_wp_id[]" size="30" value="<?php echo $image['image_wp_id']; ?>">
      </div>
      <div class="left_line" style="">
      <?php echo $image['image_thumb']; ?>
      <!--<img src="" width="150">-->
      </div>
      <div class="clear_line"></div>

    </div>
    
      </div>
      </div>
      
   </form>
  </div>
  <?php
  }
 }
?>
</div>
<form method="POST" id="bulk_bgimages_frm_all" class="form-inline bulk_bgimages_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=2&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>&amp;updated=true">
          <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_all_bgimages');
    }
  ?>
<div class="bulk_bgimages_frm_div" style="display:none;">

</div>
      <input type="submit" name="save_all_bgimages_btn" value="<?php echo $lang[$current_language]['Background Images'][' Save All BG Images ']; ?>">
</form>
