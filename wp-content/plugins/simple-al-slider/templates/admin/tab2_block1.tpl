<h2><?php echo (isset($slides_caption)) ? $slides_caption : $lang[$current_language]['Slides']['Slides']; ?></h2>

<div class='slides_output_area'>
<button id="select_all_slides"><?php echo $lang[$current_language]['Slides']['Select All']; ?></button>
<button id="select_none_slides"><?php echo $lang[$current_language]['Slides']['Select None']; ?></button>
<?php
if (isset($slider['slides_info'])&&(!empty($slider['slides_info'])))
foreach ($slider['slides_info'] as $slide)
  {
  if (isset($slide['sldsid'])&&(!empty($slide['sldsid'])))
    {
  ?>
  <div class='slide_container'>
  <div class="chk">
  <div class="chk_in">
    <input type="checkbox" name="slides_chk_now[]" value="<?php echo $slide['sldsid']; ?>">
  </div>
</div>

  <form method="POST" id="slide_frm_<?php echo $slide['sldsid']; ?>" class="slide_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=1&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>&amp;updated=true">
    <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_slide');
    }
  ?>
<div class="panel panel-primary inner_div_slide_frm">
<div class="panel-heading">

  <h3 class="panel-title"><?php echo (empty($slide['sldsname'])) ? $lang[$current_language]['Slides']['Slide']." (id:".$slide['sldsid'].")" : $lang[$current_language]['Slides']['Slide']." (".$lang[$current_language]['Slides']['Name'].":".$slide['sldsname'].")"; ?></h3>
  
      </div>
<div class="panel-body">

  <input type='hidden' name='slide_id[]' value='<?php echo $slide['sldsid']; ?>'>
    <div class='slide_show'>
      <table>
      
      <tr>
      <td>
      <?php echo $lang[$current_language]['Slides']['Name']; ?>
      </td>
      <td>
      <input type="text" name="slide_name[]" size="30" value="<?php echo $slide['sldsname']; ?>">
      </td>
      </tr>

      <tr>
      <td>
      <?php echo $lang[$current_language]['Slides']['Actions']; ?>
      </td>
      <td>
      <input type="submit" name="save_slide_btn" value="<?php echo $lang[$current_language]['Slides'][' Save Slide ']; ?>">
      <input type="submit" name="del_slide_btn" value="<?php echo $lang[$current_language]['Slides'][' Delete Slide ']; ?>">
      </td>
      </tr>
      
      </table>
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


<form method="POST" id="bulk_slides_frm_all" class="form-inline bulk_slides_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=1&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>&amp;updated=true">
          <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_all_slides');
    }
  ?>
<div class="bulk_slides_frm_div" style="display:none;">

</div>
      <input type="submit" name="save_all_slides_btn" value="<?php echo $lang[$current_language]['Slides'][' Save All Slides ']; ?>">
</form>
  <br>
<form id="mass_action_slides_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=1&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>&amp;updated=true">
  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_slide_delete_mass');
    }
  ?>
<div class="hidden_chk_1">
  
</div>
<select id="slide_mass_action" name="slide_mass_action">
  <option value="0"><?php echo $lang[$current_language]['Slides']['None']; ?></option>
  <option value="1"><?php echo $lang[$current_language]['Slides']['Delete']; ?></option>
</select>
<input type="submit" id="slide_mass_effect" name="slide_mass_execution_btn" value="<?php echo $lang[$current_language]['Slides']['Execute']; ?>">
</form>

<?php
  echo $slds_pagination;
?>