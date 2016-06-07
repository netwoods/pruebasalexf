<h2><?php echo $lang[$current_language]['Elements']['Elements']; ?></h2>
<p style="">* <?php echo $lang[$current_language]['Elements']['Images Alt Notice']; ?></p>

<button name="create_new_text"><?php echo $lang[$current_language]['Elements']['Create New Element']; ?></button>
<br>
<button class="apply_for_all_show"><?php echo $lang[$current_language]['Elements']['Bulk Apply To Elements']; ?></button>
<div class="panel panel-primary">
<div class="panel-heading">
        <h3 class="panel-title"><?php echo $lang[$current_language]['Elements']['Bulk Apply To Elements']; ?></h3>
      </div>
<div class="panel-body">
<div class="apply_for_all_elements" style="display:none;">
<div class="left_line" style="margin-left:30px;">
      <table>
      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Name']; ?>
      </td>
      <td>
      <input type="text" name="aname" size="30" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk URL']; ?>
      </td>
      <td>
      <input type="text" name="aurl" size="30" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Text']; ?>
      </td>
      <td>
      <input type="text" name="atext" size="30" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Type']; ?>
      </td>
      <td>
      <select name="aelement_type">
      <?php
      $type_vals = array(-1 => '*', 0 => $lang[$current_language]['Elements']['Text Element'], 1 => $lang[$current_language]['Elements']['Image Element'], 2 => $lang[$current_language]['Elements']['Template Element']);
      foreach ($type_vals as $k=>$typ)
        {
        if (-1 == $k)
          echo '<option value="'.$k.'" selected>'.$typ.'</option>';
          else
          echo '<option value="'.$k.'">'.$typ.'</option>';
        }
      ?>
      </select>
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Image']; ?>
      </td>
      <td>
      <input type="text" class="aelement_image" name="aelement_image" size="50" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Template']; ?>
      </td>
      <td>
      <select  name="aelement_template">
      <option value="-1">*</option>
      <?php
      if (isset($templates))
      foreach ($templates as $tmpl)
        {
            echo "<option value='".sanitize_text_field($tmpl)."'>".sanitize_text_field($tmpl)."</option>";
        }
      ?>
      </select>
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Width']; ?>
      </td>
      <td>
      <input type="text" name="awidth" size="10" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Height']; ?>
      </td>
      <td>
      <input type="text" name="aheight" size="10" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Classes']; ?>
      </td>
      <td>
      <input type="text" name="aclasses" size="30" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Offset Left']; ?>
      </td>
      <td>
      <input type="text" name="aoffsetleft" size="10" value="*">
      </td>
      </tr>
</table>
</div>
<div class="left_line" style="margin-left:30px;">
<table>
      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Offset Top']; ?>
      </td>
      <td>
      <input type="text" name="aoffsettop" size="10" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Color']; ?>
      </td>
      <td>
      <input type="text" name="acolor" size="10" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Background Color']; ?>
      </td>
      <td>
      <input type="text" name="abgcolor" size="10" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Style']; ?>
      </td>
      <td>
      <input type="text" name="astyle" size="50" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Size']; ?>
      </td>
      <td>
      <input type="text" name="asize" size="10" value="*">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk Actions']; ?>
      </td>
      <td>
      <input type="submit" name="apply_for_all_btn" value="<?php echo $lang[$current_language]['Elements']['Bulk Apply For ALL Elements ']; ?>">
      <br>
      <input type="submit" name="apply_for_checked_btn" value="<?php echo $lang[$current_language]['Elements']['Bulk Apply For Checked Elements ']; ?>">
          <input type="submit" class="close_apply_for_all_btn" value="<?php echo $lang[$current_language]['Elements']['Bulk Close']; ?>">
      </td>
      </tr>

      <tr>
      <td>

      </td>
      <td>
      <?php echo $lang[$current_language]['Elements']['Bulk left old value']; ?>
      </td>
      </tr>
      
      </table>
</div>
</div>

</div>
</div>


<div class='texts_output_area'>
<?php
if (isset($slider['slides_info'])&&(!empty($slider['slides_info'])))
foreach ($slider['slides_info'] as $slide)
 {
if (isset($slide['texts'])&&(!empty($slide['texts'])))
  foreach ($slide['texts'] as $text)
  {
  ?>
  <div class='text_container'>
  <form method="POST" id="text_frm_<?php echo $text['txtid']; ?>" class="form-inline text_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=3&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>&amp;updated=true">
          <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_text');
    }
  ?>
  <div class="chk" style="padding-left:10px;">
  <div class="chk_in">
    <input type="checkbox" name="elements_chk_now[]" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo $text['txtid']; ?>">
  </div>
  </div>

<div class="panel panel-primary inner_div_frm">

<div class="panel-heading">
  <h3 class="panel-title"><?php echo $text['txtname']; ?></h3>
  
  </div>
<div class="panel-body">

  <input type='hidden' name='text_id[]' value='<?php echo $text['txtid']; ?>'>
    <div class='text_show'>
      <div class="left_line">

  <div class="left_line">
      <table>
     
      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Name']; ?>
      </td>
      <td>
      <input type="text" name="name[]" size="30" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo stripslashes($text['txtname']); ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['URL']; ?>
      </td>
      <td>
      <input type="text" name="url[]" size="30" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo $text['txturl']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Text']; ?>
      </td>
      <td>
      <input type="text" name="text[]" size="30" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo htmlspecialchars(stripslashes($text['text'])); ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Type']; ?>
      </td>
      <td>
      <select name="element_type[]" class="elem_<?php echo $text['txtid']; ?>">
      <?php
      $type_vals = array(0 => $lang[$current_language]['Elements']['Text Element'], 1 => $lang[$current_language]['Elements']['Image Element'], 2 => $lang[$current_language]['Elements']['Template Element']);
      foreach ($type_vals as $k=>$typ)
        {
        if ($text['txttype'] == $k)
          echo '<option value="'.$k.'" selected>'.$typ.'</option>';
          else
          echo '<option value="'.$k.'">'.$typ.'</option>';
        }
      ?>
      </select>
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Image']; ?>
      </td>
      <td>
      <input type="text" class="element_image elem_<?php echo $text['txtid']; ?>" name="element_image[]" size="50" value="<?php echo esc_url($text['txtimage']); ?>">
      <br><button class="set_image"><?php echo $lang[$current_language]['Elements']['Add Image']; ?></button>
      <div style="display:none;">
      <?php if ((isset($text['txtimage_thumb']))&&(!empty($text['txtimage_thumb']))) echo $text['txtimage_thumb']; else echo plugins_url("../../images/none.jpg", __FILE__); ?>
      </div>
      <img class="element_image_src" src="<?php echo plugins_url("../../images/none.jpg", __FILE__); ?>" width="<?php echo ($text['txtwidth']<150) ? $text['txtwidth'] : 150; ?>">
      <div class="for_attachment_id" style="display:none;">
      <input type='hidden' name='image_elem_wp_id[]' value='<?php echo $text['image_elem_wp_id']; ?>'>
      </div>
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Template']; ?>
      </td>
      <td>
      <select  name="element_template[]" class="elem_<?php echo $text['txtid']; ?>">
      <?php
      if ((isset($templates))&&(isset($text['template'])))
      foreach ($templates as $tmpl)
        {
          if ($tmpl == $text['template'])
            echo "<option value='".sanitize_text_field($tmpl)."' selected>".sanitize_text_field($tmpl)."</option>";
            else
            echo "<option value='".sanitize_text_field($tmpl)."'>".sanitize_text_field($tmpl)."</option>";
        }
      ?>
      </select>
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Width']; ?>
      </td>
      <td>
      <input type="text" name="width[]" size="10" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo $text['txtwidth']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Height']; ?>
      </td>
      <td>
      <input type="text" name="height[]" size="10" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo $text['txtheight']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Classes']; ?>
      </td>
      <td>
      <input type="text" name="classes[]" size="30" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo $text['classes']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Offset Left']; ?>
      </td>
      <td>
      <input type="text" name="offsetleft[]" size="10" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo $text['offsetleft']; ?>">
      </td>
      </tr>
</table>
</div>
<div class="left_line" style="margin-left:30px;">
<table>
      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Offset Top']; ?>
      </td>
      <td>
      <input type="text" name="offsettop[]" size="10" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo $text['offsettop']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Color']; ?>
      </td>
      <td>
      <input type="text" name="color[]" size="10" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo $text['color']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Background Color']; ?>
      </td>
      <td>
      <input type="text" name="bgcolor[]" size="10" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo $text['bgcolor']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Style']; ?>
      </td>
      <td>
      <input type="text" name="style[]" size="50" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo $text['style']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Size']; ?>
      </td>
      <td>
      <input type="text" name="size[]" size="10" class="elem_<?php echo $text['txtid']; ?>" value="<?php echo $text['size']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Slide']; ?>
      </td>
      <td>
    <select name="slide_id[]" class="elem_<?php echo $text['txtid']; ?>">
    <?php
    if (isset($slider['slides_info'])&&(!empty($slider['slides_info'])))
      foreach ($slider['slides_info'] as $slide)
      {
      $swp_slide_caption = (empty($slide['sldsname'])) ? "id:".$slide['sldsid'] : $slide['sldsname'];
      if ($slide['sldsid'] == $text['txtsldid'])
        echo "<option value='".$slide['sldsid']."' selected='selected'>".$swp_slide_caption."</option>";
      else
        echo "<option value='".$slide['sldsid']."'>".$swp_slide_caption."</option>";
      }
    ?>
    </select>
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Actions']; ?>
      </td>
      <td>
      <input type="submit" name="save_text_btn" value="<?php echo $lang[$current_language]['Elements'][' Save Element ']; ?>">
      <input type="submit" name="del_text_btn" value="<?php echo $lang[$current_language]['Elements'][' Delete Element ']; ?>">
      </td>
      </tr>
      
      </table>
      </div>

     
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
<form method="POST" id="bulk_elements_frm_all" class="form-inline bulk_elements_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=3&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>&amp;updated=true">
          <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_all_elements');
    }
  ?>
<div class="bulk_elements_frm_div" style="display:none;">

</div>
      <input type="submit" name="save_all_elements_btn" value="<?php echo $lang[$current_language]['Elements'][' Save All Elements ']; ?>">
</form>

  <br>
<form id="mass_action_elements_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=3&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>&amp;updated=true">
  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_element_delete_mass');
    }
  ?>
<div class="hidden_chk_2">
  
</div>
<select id="element_mass_action" name="element_mass_action">
  <option value="0"><?php echo $lang[$current_language]['Elements']['None']; ?></option>
  <option value="1"><?php echo $lang[$current_language]['Elements']['Delete']; ?></option>
</select>
<input type="submit" id="element_mass_effect" name="element_mass_execution_btn" value="<?php echo $lang[$current_language]['Elements']['Execute']; ?>">
</form>
