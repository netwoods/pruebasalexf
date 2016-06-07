<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

           //Add script to front end
    add_action('init', array('\simpleal\Controller_Main', 'register_scripts_fronend' ));
    add_action('wp_footer', array('\simpleal\Controller_Main', 'print_scripts_fronend' ));
    
          //Register Widget for front end
    add_action( 'widgets_init', array('\simpleal\Sial_Users', 'register_slider_widget') );
    
?>