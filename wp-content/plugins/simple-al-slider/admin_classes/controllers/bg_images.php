<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

class Controller_BgImages extends Sial_Controller{
private $model_bgimages;

public function __construct($model_bgimages)
  {
  parent::__construct();
    $this->model_bgimages = $model_bgimages;
  }

public function saveBgData()
  {
    $hlp = new Sial_Helper();

   if (isset($_POST['save_all_bgimages_btn']))
    {
      $this->check('sp_all_bgimages');
      
      foreach ($_POST['image'] as $key=>$img)
       {
          $_POST['image_wp_id'][$key] = $hlp->pn_get_attachment_id_from_url( $img );
       }
      $this->model_bgimages->saveBgData($_POST);
      
      return true;
    }
   elseif (isset($_POST['save_image_btn']))
    {
      $this->check('sp_bg_image');
      
      $this->model_bgimages->saveBgData($_POST);
      
      return true;
    }
   return false; 
  }
public function saveBgData_ajax()
  {
   if (isset($_POST['bg_save_ajax']))
    {
      $this->check_ajax('upd_rec_img', 'nonce');
      
      $result = $this->model_bgimages->insBgData($_POST);
      
      echo $result;
    }
   exit(); 
  }
public function getBgData($id)
  {
      return $this->model_bgimages->getBgInfo($id);
  }
public function delBgData()
  {
  if (isset($_POST['del_image_btn']))
    {
      $this->check('sp_bg_image');
      
      return $this->model_bgimages->delBgInfo($_POST['image_id'][0]);
    }
   return false;
  }
public function massActBgData()
  {
   if (isset($_POST['mass_execution_btn']))
    {
      $this->check('sp_bg_image_delete_mass');
      
          switch ($_POST['mass_action'])
          {
          case '1' : $this->model_bgimages->massDelBgData($_POST['chk_now']); break;
          }

      return true;
     }
   return false;
  }
public function execute($pid)
  {
  //Ajax request
    //add_action("wp_ajax_saveBgData_ajax", array($this, "saveBgData_ajax"));
    
  //Delete background image
    $this->delBgData();
        
  //Mass action bg images
    $this->massActBgData();
        
  //Save background image
    $bgid = $this->saveBgData();

  //Load backgrounds
    $bg_info = '';//$this->getBgData($pid);

  return array($bgid, $bg_info);
  }
}
?>