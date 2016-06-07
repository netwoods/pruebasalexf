<div class='slides_hidden_form'>

<div class='slide_container'>
  <div class="chk">
  <div class="chk_in">
    <input type="checkbox" name="slides_chk_now[]" value="[SLIDE_ID]">
  </div>
</div>

  <form method="POST" id="slide_frm_[SLIDE_ID]" class="slide_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=1&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>&amp;updated=true">
      <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_slide');
    }
  ?>
    <h3>[SLIDE_NAME]</h3>
  <input type='hidden' name='slide_id' value='[SLIDE_ID]'>
    <div class='slide_show'>
      <table>
      
      <tr>
      <td>
      Name
      </td>
      <td>
      <input type="text" name="slide_name" size="30" value="[SLIDE_NAME]">
      </td>
      </tr>

      <tr>
      <td>
      Actions
      </td>
      <td>
      <input type="submit" name="save_slide_btn" value=" Save Slide ">
      <input type="submit" name="del_slide_btn" value=" Delete Slide ">
      </td>
      </tr>
      
      </table>
    </div>
  </form>
</div>
</div>