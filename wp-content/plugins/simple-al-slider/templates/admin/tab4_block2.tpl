<div class='text_hidden_form'>

  <div class='text_container'>
  <form method="POST" id="text_frm_[TEXT_ID]" class="text_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=3&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>&amp;updated=true">
            <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_text');
    }
  ?>

  <div class="chk" style="padding-left:10px;">
  <div class="chk_in">
    <input type="checkbox" name="elements_chk_now[]" class="elem_[TEXT_ID]" value="[TEXT_ID]">
  </div>
  </div>

<div class="panel panel-primary inner_div_frm">
<div class="panel-heading">

  <h3 class="panel-title">[TEXT_NAME]</h3>
  
    </div>
<div class="panel-body">

  <input type='hidden' name='text_id[]' value='[TEXT_ID]'>
    <div class='text_show'>
      <div class="left_line">

  <div class="left_line">
      <table>
      
      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Name']; ?>
      </td>
      <td>
      <input type="text" name="name[]" class="elem_[TEXT_ID]" size="30" value="[TEXT_NAME]">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['URL']; ?>
      </td>
      <td>
      <input type="text" name="url[]" class="elem_[TEXT_ID]" size="30" value="">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Text']; ?>
      </td>
      <td>
      <input type="text" name="text[]" class="elem_[TEXT_ID]" size="30" value="[TEXT]">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Type']; ?>
      </td>
      <td>
      <select name="element_type[]" class="elem_[TEXT_ID]">
      <?php
      $type_vals = array(0 => "Text Element", 1 => "Image Element", 2 => "Template Element");
      foreach ($type_vals as $k=>$typ)
        {
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
      <input type="text" class="element_image elem_[TEXT_ID]" name="element_image[]" size="50" value="">
      <br>
      <button class="set_image"><?php echo $lang[$current_language]['Elements']['Add Image']; ?></button>
      <img class="element_image_src" src="<?php echo plugins_url("../../images/none.jpg", __FILE__); ?>">
      <div class="for_attachment_id" style="display:none;">
      <input type='hidden' name='image_elem_wp_id[]' value='<?php echo plugins_url("../../images/none.jpg", __FILE__); ?>'>
      </div>
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Template']; ?>
      </td>
      <td>
      <select  name="element_template[]" class="elem_[TEXT_ID]">
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
      <?php echo $lang[$current_language]['Elements']['Width']; ?>
      </td>
      <td>
      <input type="text" name="width[]" class="elem_[TEXT_ID]" size="10" value="0">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Height']; ?>
      </td>
      <td>
      <input type="text" name="height[]" class="elem_[TEXT_ID]" size="10" value="0">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Classes']; ?>
      </td>
      <td>
      <input type="text" name="classes[]" class="elem_[TEXT_ID]" size="30" value="">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Offset Left']; ?>
      </td>
      <td>
      <input type="text" name="offsetleft[]" class="elem_[TEXT_ID]" size="10" value="0">
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
      <input type="text" name="offsettop[]" class="elem_[TEXT_ID]" size="10" value="0">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Color']; ?>
      </td>
      <td>
      <input type="text" class="hdn_color elem_[TEXT_ID]" name="color[]" size="10" value="#000000">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Background Color']; ?>
      </td>
      <td>
      <input type="text" class="hdn_color elem_[TEXT_ID]" name="bgcolor[]" size="10" value="#ffffff">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Style']; ?>
      </td>
      <td>
      <input type="text" name="style[]" class="elem_[TEXT_ID]" size="50" value="">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Size']; ?>
      </td>
      <td>
      <input type="text" name="size[]" class="elem_[TEXT_ID]" size="10" value="10">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Elements']['Slide']; ?>
      </td>
      <td>
    <select name="slide_id[]" id="slide_id_[TEXT_ID]" class="elem_[TEXT_ID]">
    <?php
    if (isset($slider['slides_info'])&&(!empty($slider['slides_info'])))
    {
      foreach ($slider['slides_info'] as $slide)
      {
      $swp_slide_caption = (empty($slide['sldsname'])) ? "id:".$slide['sldsid'] : $slide['sldsname'];
        echo "<option value='".$slide['sldsid']."'>".$swp_slide_caption."</option>";
      }
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
</div>