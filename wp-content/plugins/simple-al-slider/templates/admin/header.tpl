<?php	
defined('ABSPATH') or die("No script hack please!");

if(function_exists('current_user_can'))
if(!current_user_can('manage_options')) {
die('Access Denied');
}
if(!function_exists('current_user_can')){
  die('Access Denied');
}

 global $lang;
?>
<div class="simple_only_for_messages">

</div>
  <script>
  jQuery(function($) {

  window.simpleal_info_alert_set_width_and_height = '<?php echo $lang[$current_language]['alert message']['save width and height']; ?>';
  window.simpleal_info_alert_wrong_project_name = '<?php echo $lang[$current_language]['alert message']['wrong project name']; ?>';
  window.simpleal_info_alert_updated_successfully = '<?php echo $lang[$current_language]['alert message']['updated successfully']; ?>';
  window.simpleal_info_alert_wrong_item_text = "<?php echo $lang[$current_language]['alert message']['wrong item text']; ?>";
  
    $('.btn_href').addClass('button');
    
    $('#button_show_add_project').addClass('button');
    $('.set_backgrounds').addClass('button');
    $( "input[type=submit], button" ).not(".hdn").addClass('button');

      if (empty($('#projects').val())) 
        {
        $( "input[type=submit], button" ).not('.any').each(function(){
        if ((($(this).attr("id")) != 'button_show_add_project')&&(($(this).attr("id")) != 'new_project_create_id_btn')&&
        (($(this).attr("id")) != 'new_project_close_id_btn'))
          {
          $(this).attr("disabled", "disabled");
          }
        });
        }

<?php
    $actual_link = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
    $('#projects').change( function() {
      location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=0&pid="+$('#projects').val();
    });

window.alert_show = function(msg, type)
  {
  var src = "";
  switch (type)
    {
    case 'success':
     src = '<div class="alert alert-success" role="alert">'+msg+'</div>';
    break;
    case 'info':
     src = '<div class="alert alert-info" role="alert">'+msg+'</div>';
    break;
    case 'danger':
     src = '<div class="alert alert-danger" role="alert">'+msg+'</div>';
    break;
    }

    $('.simple_only_for_messages').html(src);
  }

      if ('<?php echo (array_key_exists('updated', $_GET)) ? $_GET['updated'] : ""; ?>' == 'true')window.alert_show(window.simpleal_info_alert_updated_successfully, 'success');

function empty(element) {
    if (
            element === ""          ||
            element === 0           ||
            element === "0"         ||
            element === null        ||
            element === "NULL"      ||
            element === "null"      ||
            element === undefined   ||
            element === false
        ) {
        return true;
    }
    if (typeof(element) === 'object') {
        var i = 0;
        for (key in element) {
            i++;
        }
        if (i === 0) { return true; }
    }
    return false;
}

$('.new_project_close_btn').unbind('click').bind('click', function(event){
              event.preventDefault();
$( ".new_project_show_dlg" ).hide('slow');
});
        
$('#button_show_add_project').unbind('click').bind('click', function(event) {
            event.preventDefault();
$( ".new_project_show_dlg" ).show('slow');
  });
  
$('#new_project_create_id_btn').unbind('click').bind('click', function(event) {
    if ($('#new_project_name').val() == '')
      {
            event.preventDefault();
            window.alert_show(window.simpleal_info_alert_wrong_project_name, 'danger');
      }
  });

    $('#langs').change( function() {
      location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=0&pid="+$('#projects').val()+"&langs="+$('#langs').val();
    });
  
});
</script>
<div><img src='<?php echo plugins_url("../../images/caption.png", __FILE__); ?>'></div>

<div id="dialog-message"></div>

<div id="image_nonce"><?php 
if (function_exists('wp_create_nonce'))
    {
echo wp_create_nonce("upd_rec_img");
    }
 ?></div>
 
 <div id="text_nonce"><?php 
if (function_exists('wp_create_nonce'))
    {
echo wp_create_nonce("upd_rec_txt");
    }
 ?></div>
 <div id="slides_nonce"><?php 
if (function_exists('wp_create_nonce'))
    {
echo wp_create_nonce("upd_rec_slide");
    }
 ?></div>


 <div style="float:left;width:50%;">
 <?php echo $lang[$current_language]['Projects']; ?>
 <select name="cur_project" id="projects">
 <?php
 foreach ($all_projects as $project)
  {
  if ($proj_id == $project->id)
  echo "<option value='".$project->id."' selected='selected'>".$project->name."(id:".$project->id.")</option>";
  else
  echo "<option value='".$project->id."'>".$project->name."(id:".$project->id.")</option>";
  }
 ?>
 </select>
 <button name="new_project" id="button_show_add_project"><?php echo $lang[$current_language]['Create new project']; ?></button>

<form id="projdel" name="project_delete_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=<?php echo $tab_active; ?>">
  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_project_del');
    }
  ?>
<input type="hidden" name="proj_id" value="<?php if (isset($_GET['pid']))echo $_GET['pid']; else echo $proj_id; ?>">
<input type="submit" name="del_proj_btn" value="<?php echo $lang[$current_language]['Delete project']; ?>">
</form>

 <div class="new_project_show_dlg" title="New project creation"  style="display:none;background-color:#fff;width:350px;padding-left:20px;">
  <form id="pcf" name="project_creation_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=simpleal_slider_show&active=<?php echo $tab_active; ?>">
  <?php
  if (function_exists('wp_nonce_field'))
    {
    wp_nonce_field('sp_project_name');
    }
  ?>
<div class="panel panel-primary">
<div class="panel-heading">

 <h3 class="add_proj_header2 panel-title"><?php echo $lang[$current_language]['new project']['New project']; ?></h3>
 
       </div>
<div class="panel-body">

 <input type="text" name="new_project_name" value="" id="new_project_name">
 <input type="hidden" name="new_project_btn" value="Add project" id="add_proj_btn">
 <input type="submit" id="new_project_create_id_btn" value="<?php echo $lang[$current_language]['new project']['Create']; ?>">
 <input type="submit" id="new_project_close_id_btn" class="new_project_close_btn"  value="<?php echo $lang[$current_language]['new project']['Close']; ?>">
 
        </div>
               </div>
  </form>
 </div>
 </div>

<?php
    $actual_link = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$actual_link = preg_replace("/&langs=[^&]+/", "", $actual_link);

    if (preg_match("/&active=\d+/", $actual_link) != 0)
      {
                        $actual_link0 = preg_replace("/&active=\d+/", "&active=0", $actual_link);
                        $actual_link1 = preg_replace("/&active=\d+/", "&active=1", $actual_link);
                        $actual_link2 = preg_replace("/&active=\d+/", "&active=2", $actual_link);
                        $actual_link3 = preg_replace("/&active=\d+/", "&active=3", $actual_link);
                        $actual_link4 = preg_replace("/&active=\d+/", "&active=4", $actual_link);
                        $actual_link5 = preg_replace("/&active=\d+/", "&active=5", $actual_link);
      }
      else
      {
                        $actual_link0 = $actual_link."&active=0";
                        $actual_link1 = $actual_link."&active=1";
                        $actual_link2 = $actual_link."&active=2";
                        $actual_link3 = $actual_link."&active=3";
                        $actual_link4 = $actual_link."&active=4";
                        $actual_link5 = $actual_link."&active=5";
      }
    if (preg_match("/pid=\d+/", $actual_link) == 0)
      {
                        $actual_link0 .= "&pid=".((isset($_GET['pid'])) ? $_GET['pid'] : $proj_id);
                        $actual_link1 .= "&pid=".((isset($_GET['pid'])) ? $_GET['pid'] : $proj_id);
                        $actual_link2 .= "&pid=".((isset($_GET['pid'])) ? $_GET['pid'] : $proj_id);
                        $actual_link3 .= "&pid=".((isset($_GET['pid'])) ? $_GET['pid'] : $proj_id);
                        $actual_link4 .= "&pid=".((isset($_GET['pid'])) ? $_GET['pid'] : $proj_id);
                        $actual_link5 .= "&pid=".((isset($_GET['pid'])) ? $_GET['pid'] : $proj_id);
      }

?>
<div id="tabs" style="float:right;width:49%;">
  <ul>
    <li class="button button-primary"><a href="<?php echo $actual_link0; ?>" style="color:#fff;text-decoration:none;"><?php echo $lang[$current_language]['menu']['Slider']; ?></a></li>
    <li class="button button-primary"><a href="<?php echo $actual_link1; ?>" style="color:#fff;text-decoration:none;"><?php echo $lang[$current_language]['menu']['Slides']; ?></a></li>
    <li class="button button-primary"><a href="<?php echo $actual_link2; ?>" style="color:#fff;text-decoration:none;"><?php echo $lang[$current_language]['menu']['Background Images']; ?></a></li>
    <li class="button button-primary"><a href="<?php echo $actual_link3; ?>" style="color:#fff;text-decoration:none;"><?php echo $lang[$current_language]['menu']['Elements']; ?></a></li>
    <li class="button button-primary"><a href="<?php echo $actual_link4; ?>" style="color:#fff;text-decoration:none;"><?php echo $lang[$current_language]['menu']['Settings']; ?></a></li>
    <li class="button button-primary"><a href="<?php echo $actual_link5; ?>" style="color:#fff;text-decoration:none;"><?php echo $lang[$current_language]['menu']['Paste Code']; ?></a></li>
  </ul>
  
  <div style="float:right;margin-right:40px;">
 <?php echo $lang[$current_language]['Main Info']['Language']; ?>
 <select name="cur_lang" id="langs">
 <?php
 foreach ($lang as $lng_key=>$lng)
  {
  if ($lng_key == $current_language)
  echo "<option value='".$lng_key."' selected='selected'>".$lng['language']."</option>";
  else
  echo "<option value='".$lng_key."'>".$lng['language']."</option>";
  }
 ?>
 </select>
</div>

</div>
