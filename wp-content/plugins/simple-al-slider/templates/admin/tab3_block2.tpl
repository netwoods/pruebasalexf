<div class='images_hidden_form'>

<div class='image_container'>
<form method="POST" id="image_frm_[IMAGE_ID]" class="image_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=2&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>&amp;updated=true">
        <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_bg_image');
    }
  ?>
  <h3>[IMAGE_NAME]</h3>
  <input type='hidden' name='image_id' value='[IMAGE_ID]'>
    <div class='image_show'>
      <div class="left_line">
      <table>
      
      <tr>
      <td>
      Name
      </td>
      <td>
      <input type="text" name="image_name" size="30" value="[IMAGE_NAME]">
      </td>
      </tr>

      <tr>
      <td>
      URL
      </td>
      <td>
      <input type="text" name="url" size="30" value="">
      </td>
      </tr>

      <tr>
      <td>
      Image File
      </td>
      <td>
      <input type="text" name="image" size="50" value="[IMAGE_FILE]">
      </td>
      </tr>

      <tr>
      <td>
      Actions
      </td>
      <td>
      <input type="submit" name="save_image_btn" value=" Save Image ">
      <input type="submit" name="del_image_btn" value=" Delete Image ">
      </td>
      </tr>
      
      </table>
      </div>
      <div class="left_line">
      [IMAGE_SRC_FULL]
      </div>
      <div class="clear_line"></div>
    </div>
 </form>
</div>
</div>