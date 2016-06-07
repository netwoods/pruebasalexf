<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

class Sial_Users extends Sial_Base{

public static function simple_al_slider($atts)
  {
  global $simpleal_adding_scripts;
  $simpleal_adding_scripts = true;
  
  $front = new Sial_Users_Common();
    return $front->execute($atts['id']);
  }

}
?>