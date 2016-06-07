<?php
/*
Plugin Name: Simple Al Slider
Description: Simple slider with background and elements. And capability to add images, buttons, html templates and videos(youtube...).
Version: 1.2.10
Author: alexdtn (<a href="http://al-plugins.biz/">homesite</a>)
*/

namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

if (is_admin())
 {
  if(!function_exists('wp_get_current_user')) {
    include(ABSPATH . "wp-includes/pluggable.php"); 
  }
  if (is_user_logged_in())
   {
      if ( current_user_can('edit_plugins') || current_user_can('install_plugins') || current_user_can('activate_plugins') ||
   current_user_can('delete_plugins') || current_user_can('update_plugins') ) {


    require_once dirname(__FILE__).'/inc/inclusion.php';

    
    require_once dirname(__FILE__).'/admin_simple_al_slider.php';
    try
    {
      $admin = new Sial_Admin(__FILE__);
    } catch (Exception $e){
      echo $e->getMessage();
    }
   }
  }
 }
  else
  {
  
  require_once dirname(__FILE__).'/inc/inclusion_front.php';

    require_once dirname(__FILE__).'/users_simple_al_slider.php';

      //Main slider output
    add_shortcode('simple_al_slider', array('\simpleal\Sial_Users', 'simple_al_slider'));
    
  }
