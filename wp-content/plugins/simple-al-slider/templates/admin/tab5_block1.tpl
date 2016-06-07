<h2><?php echo $lang[$current_language]['Settings']['Slider Settings']; ?></h2>
<form method="POST" id="settings_frm_1" class="settings_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=4&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>">
  <input type="hidden" name="pid" value="<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>">
  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('settings_buttons');
    }
  ?>
<div class="panel panel-primary">
<div class="panel-heading">

<h3 class="panel-title"><?php echo $lang[$current_language]['Settings']['Buttons']; ?></h3>

  </div>
<div class="panel-body">

<table id="tbl_settings">
<?php
$settings_ind = range(1, 5);
foreach ($settings_ind as $setts)
  {
  echo "<tr><td>";
  if ($slider['main_info']['settings_buttons'] == $setts)
    echo "<input type='radio' name='settings_buttons' checked='checked' value='".$setts."'>";
      else
    echo "<input type='radio' name='settings_buttons' value='".$setts."'>";
  echo "</td><td>";
  echo $lang[$current_language]['Settings']['Buttons']." #".$setts;
  echo "</td><td>";
  echo "<img src='".plugins_url("../../images/arrow_left_0".$setts.".png", __FILE__)."'>";
  echo "<img src='".plugins_url("../../images/arrow_right_0".$setts.".png", __FILE__)."'>";
  echo "</td></tr>";
  }
  echo "<tr><td>";
  if ($slider['main_info']['settings_buttons'] == 0)
    echo "<input type='radio' name='settings_buttons' checked='checked' value='".(0)."'>";
      else
    echo "<input type='radio' name='settings_buttons' value='".(0)."'>";
  echo "</td><td>";
  echo $lang[$current_language]['Settings']['Buttons'];
  echo "</td><td>";
  echo $lang[$current_language]['Settings']['Don\'t show buttons'];
  echo "</td></tr>";

?>
</table>
<h4><?php echo $lang[$current_language]['Settings']['Buttons Offset Top']; ?></h4>
<table>
<tr><td>
<div style='font-weight:bold;'><?php echo $lang[$current_language]['Settings']['Offset']; ?></div>
</td><td>
<input type="text" class="digits_fld" name="settings_buttons_top" value="<?php echo $slider['main_info']['settings_buttons_top']; ?>">
</td><td>
<?php echo $lang[$current_language]['Settings']['If 0 - "Default top offset"']; ?>
</td></tr>
</table>

<div style="float:left;">
<h4><?php echo $lang[$current_language]['Settings']['Buttons Transparency']; ?></h4>
<table>
<tr><td>
<div style='font-weight:bold;'><?php echo $lang[$current_language]['Settings']['Transparency']; ?> (%)</div>
</td>
<td>
<input type="text" class="digits_fld" name="settings_buttons_opacity" value="<?php echo $slider['main_info']['settings_buttons_opacity']; ?>">
</td><td>
</td>
</tr>
</table>
</div>

<div>
<h4><?php echo $lang[$current_language]['Settings']['Buttons Width']; ?></h4>
<table>
<tr><td>
<div style='font-weight:bold;'><?php echo $lang[$current_language]['Settings']['Width (buttons width = container width * this parameter / 1600)']; ?></div>
</td>
<td>
<input type="text" class="digits_fld" name="settings_buttons_width" value="<?php echo $slider['main_info']['settings_buttons_width']; ?>">
</td><td>
</td>
</tr>
</table>
</div>

<input type="submit" name="settings_buttons_save_btn" value="<?php echo $lang[$current_language]['Settings']['Save']; ?>">

</div>
</div>

</form>
<br>

<form method="POST" id="settings_indicators_frm_1" class="settings_indicators_frm" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=4&pid=<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?><?php echo (isset($_GET['pagesld'])) ? "&pagesld=".$_GET['pagesld'] : ""; ?>">
  <input type="hidden" name="pid" value="<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>">
  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('settings_indicators');
    }
  ?>

<div class="panel panel-primary">
<div class="panel-heading">

<h3 class="panel-title"><?php echo $lang[$current_language]['Settings']['Slide Bullets']; ?></h3>

  </div>
<div class="panel-body">

<table id="tbl_settings">
<?php
$settings_ind = range(1, 5);
foreach ($settings_ind as $setts)
  {
  echo "<tr><td>";
  if ($slider['main_info']['settings_indicators'] == $setts)
    echo "<input type='radio' name='settings_indicators' checked='checked' value='".$setts."'>";
      else
    echo "<input type='radio' name='settings_indicators' value='".$setts."'>";
  echo "</td><td>";
  echo $lang[$current_language]['Settings']['Bullets']." #".$setts;
  echo "</td><td>";
  echo "<img src='".plugins_url("../../images/slide_empty_0".$setts.".png", __FILE__)."'>";
  echo "<img src='".plugins_url("../../images/slide_filled_0".$setts.".png", __FILE__)."'>";
  echo "</td></tr>";
  }
  echo "<tr><td>";
  if ($slider['main_info']['settings_indicators'] == 0)
    echo "<input type='radio' name='settings_indicators' checked='checked' value='".(0)."'>";
      else
    echo "<input type='radio' name='settings_indicators' value='".(0)."'>";
  echo "</td><td>";
  echo $lang[$current_language]['Settings']['Bullets'];
  echo "</td><td>";
  echo $lang[$current_language]['Settings']['Don\'t show bullets'];
  echo "</td></tr>";

?>
</table>
<h4><?php echo $lang[$current_language]['Settings']['Bullets parameters']; ?></h4>
<table>

<tr><td>
<div style='font-weight:bold;'><?php echo $lang[$current_language]['Settings']['Top Offset']; ?></div>
</td><td>
<input type="text" class="digits_fld" name="settings_indicators_top" value="<?php echo $slider['main_info']['settings_indicators_top']; ?>">
</td><td>
<?php echo $lang[$current_language]['Settings']['If 0 - "Default bullets top offset"']; ?>
</td></tr>

<tr><td>
<div style='font-weight:bold;'><?php echo $lang[$current_language]['Settings']['Width']; ?></div>
</td><td>
<input type="text" class="digits_fld" name="settings_indicators_width" value="<?php echo $slider['main_info']['settings_indicators_width']; ?>">
</td><td>
<?php echo $lang[$current_language]['Settings']['If 0 - "Default width"']; ?>
</td></tr>

<tr><td>
<div style='font-weight:bold;'><?php echo $lang[$current_language]['Settings']['Front number of bullets by one side']; ?></div>
</td><td>
<input type="text" class="digits_fld" name="settings_num_indicators" value="<?php echo $slider['main_info']['settings_num_indicators']; ?>">
</td><td>
</td></tr>

</table>
<input type="submit" name="settings_indicators_save_btn" value="<?php echo $lang[$current_language]['Settings']['Save']; ?>">

</div>
</div>

</form>
