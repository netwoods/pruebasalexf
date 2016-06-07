<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

class Sial_Admin extends Sial_Base{
private $currentDir;
private $file;

public function __construct($file)
  {
  $this->file = $file;
  $filePath = $file;
    $this->currentDir = dirname($filePath);

    $this->activite();

  add_action('init', array($this, 'init'));
     add_action( 'widgets_init', array($this, 'register_slider_widget') );
     
    $adminCommon = new Sial_Admin_Common($this->file);
     add_action( 'plugins_loaded', array($adminCommon, 'simple_al_update_db_check' ));
  }
public function init()
  {
    $adminCommon = new Sial_Admin_Common($this->file);
        $adminCommon->init();
  }
public function activite()
  {
      Sial_Admin_Common::onActivate($this->file);
  }
  

}
?>