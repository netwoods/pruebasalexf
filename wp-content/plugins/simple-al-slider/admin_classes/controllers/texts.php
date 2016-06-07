<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

class Controller_Texts extends Sial_Controller{
private $model_texts;
  private $main_templates_path;
  
public function __construct($model_texts)
  {
  parent::__construct();
    $this->model_texts = $model_texts;
          $this->main_templates_path = plugin_dir_path( __FILE__ )."../../templates/front_templates/";
  }

public function check_templates_files($dir)
  {
  $res = array("none");

          $tmpls = glob($dir . '*');
          foreach ($tmpls as $tmpl)
          {
            if (is_file($tmpl))
            $res[] = basename($tmpl);
          }
    return $res;
  }

public function getAllTemplatesFiles()
  {
    $main_files = $this->check_templates_files($this->main_templates_path);
    
    return $main_files;
  }


public function saveTextData()
  {
  if (isset($_POST['save_all_elements_btn']))
  {
  $this->check('sp_all_elements');
  
      $this->model_texts->saveTextData($_POST);  
      
      return true;
  }
   elseif (isset($_POST['save_text_btn']))
    {
      $this->check('sp_text');
      
      $this->model_texts->saveTextData($_POST);
      
      return true;
    }
   return false; 
  }
public function saveTextData_ajax()
  {
   if (isset($_POST['txt_save_ajax']))
    {
      $this->check_ajax('upd_rec_txt', 'nonce');
      
      $result = $this->model_texts->insTextData($_POST);
      
      echo $result;
    }
   exit(); 
  }
public function getTextData($id)
  {
      return $this->model_texts->getTextInfo($id);
  }
public function delTextData()
  {
  if (isset($_POST['del_text_btn']))
    {
      $this->check('sp_text');
      
      return $this->model_texts->delTextInfo($_POST['text_id'][0]);
    }
   return false;
  }
public function massActTextData()
  {
   if (isset($_POST['element_mass_execution_btn']))
    {
      $this->check('sp_element_delete_mass');
      
          switch ($_POST['element_mass_action'])
          {
          case '1' : $this->model_texts->massDelTextData($_POST['elements_chk_now']); break;
          }

      return true;
     }
   return false;
  }
public function execute($pid)
  {
  //Load Templates files
  $text_templates = $this->getAllTemplatesFiles();
  
  //Delete text
    $this->delTextData();
        
  //Mass action texts
    $this->massActTextData();
        
  //Save text
    $textid = $this->saveTextData();

  //Load text
    $text_info = '';//$this->getTextData($pid);

  return array($textid, $text_info, $text_templates);
  }
}
?>