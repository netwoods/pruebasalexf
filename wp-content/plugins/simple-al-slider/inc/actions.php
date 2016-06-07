<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

//Ajax actions
 $db = new Sial_Db();
 
    $bgImagesController = new Controller_BgImages(new Model_BgImages($db));
      add_action("wp_ajax_simple_al_saveBgData_ajax", array($bgImagesController, "saveBgData_ajax"));

    $textsController = new Controller_Texts(new Model_Texts($db));
      add_action("wp_ajax_simple_al_saveTextData_ajax", array($textsController, "saveTextData_ajax"));

?>