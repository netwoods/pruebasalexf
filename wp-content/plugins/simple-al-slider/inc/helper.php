<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

class Sial_Helper{
public $plugin_dir;

public function __construct()
  {
  //$this->plugin_dir = "/simple_al_slider/";
  }
public function addStyle($handle, $path)
  {
  $currStyleFile = plugin_dir_path( __FILE__ )."/../".$path;
  $currStyleUrl = plugins_url("/../".$path, __FILE__);

        if ( file_exists($currStyleFile) ) {
            wp_register_style($handle, $currStyleUrl);
            wp_enqueue_style($handle);
        }
  }
public function addScrypt($handle, $path)
  {
  $currScryptFile = plugin_dir_path( __FILE__ )."/../".$path;
    $currScryptUrl = plugins_url("/../".$path, __FILE__);

        if ( file_exists($currScryptFile) ) {

            wp_register_script($handle, $currScryptUrl, array('jquery'), '1.0', true);
              wp_localize_script($handle, 'simple_al_WPURLS', array( 'pluginurl' => trailingslashit( plugin_dir_url( __FILE__ ) ) ));
            wp_print_scripts($handle);
        }

  }
public function registerStylefront($handle, $path)
  {
  $currStyleFile = plugin_dir_path( __FILE__ )."/../".$path;
  $currStyleUrl = plugins_url("/../".$path, __FILE__);

        if ( file_exists($currStyleFile) ) {
            wp_register_style($handle, $currStyleUrl);
        }
  }

public function registerScryptfront($handle, $path)
  {
  $currScryptFile = plugin_dir_path( __FILE__ )."/../".$path;
    $currScryptUrl = plugins_url("/../".$path, __FILE__);

        if ( file_exists($currScryptFile) ) {

            wp_register_script($handle, $currScryptUrl, array('jquery'), '1.0', true);
            
        }

  }
public function printStylefront($handle, $path)
  {
  $currStyleFile = plugin_dir_path( __FILE__ )."/../".$path;
  $currStyleUrl = plugins_url("/../".$path, __FILE__);

        if ( file_exists($currStyleFile) ) {
            //wp_enqueue_style($handle);
            echo "<link rel='stylesheet' property='stylesheet' id='".$handle."'  href='".$currStyleUrl."?ver=4.1.1' type='text/css' media='all' />";
        }
  }

public function printScryptfront($handle, $path)
  {
  $currScryptFile = plugin_dir_path( __FILE__ )."/../".$path;
    $currScryptUrl = plugins_url("/../".$path, __FILE__);

        if ( file_exists($currScryptFile) ) {

              if ( ! function_exists( 'get_plugins' ) ) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
              }
              
              $all_plugins = get_plugins();
              
              wp_localize_script($handle, 'simple_al_WPURLS', array( 'pluginurl' => trailingslashit( plugin_dir_url( __FILE__ ) ), 'pluginname' => $all_plugins["simple-al-slider/simple-al-slider.php"]['Name'] ));
              
            wp_print_scripts($handle);
        }

  }
function pn_get_attachment_id_from_url( $attachment_url = '' ) {
 
 global $wpdb;
 $attachment_id = false;
 
 // If there is no url, return.
 if ( '' == $attachment_url )
  return;
 
 // Get the upload directory paths
 $upload_dir_paths = wp_upload_dir();
 
 // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
 if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
 
  // If this is the URL of an auto-generated thumbnail, get the URL of the original image
  $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
 
  // Remove the upload path base directory from the attachment URL
  $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
 
  // Finally, run a custom database query to get the attachment ID from the modified attachment URL
  $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
 
 }
 
 return $attachment_id;
}

}
?>