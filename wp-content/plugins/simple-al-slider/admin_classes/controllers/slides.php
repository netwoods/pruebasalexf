<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

class Controller_Slides extends Sial_Controller{
private $model_slides;

public function __construct($model_slides)
  {
  parent::__construct();
    $this->model_slides = $model_slides;
  }

public function saveSlideData()
  {
   if (isset($_POST['save_all_slides_btn']))
    {
      $this->check('sp_all_slides');
      
      $this->model_slides->saveSlideData($_POST);
      
      return true;
    }
   elseif (isset($_POST['save_slide_btn']))
    {
      $this->check('sp_slide');
      
      $this->model_slides->saveSlideData($_POST);
      
      return $_POST['slide_id'];
    }
   return false; 
  }
public function saveSlideData_ajax()
  {
   if (isset($_POST['slide_save_ajax']))
    {
      $this->check_ajax('upd_rec', 'nonce');
      
      $id = $this->model_slides->insSlideData($_POST);
      
      echo $id;
    }
   exit(); 
  }
public function getSlideData($id)
  {
      return $this->model_slides->getSlideInfo($id);
  }
public function delSlideData()
  {
  if (isset($_POST['del_slide_btn']))
    {
      $this->check('sp_slide');
      
      return $this->model_slides->delSlideInfo($_POST['slide_id']);
    }
   return false;
  }
public function massActSlideData()
  {
   if (isset($_POST['slide_mass_execution_btn']))
    {
      $this->check('sp_slide_delete_mass');

          switch ($_POST['slide_mass_action'])
          {
          case '1' : $this->model_slides->massDelSlideData($_POST['slides_chk_now']); break;
          }

      return true;
     }
   return false;
  }
public function makePagination($slides)
  {
  global $lang;
  $current_lang = get_option( "simple_al_current_language" );
  
  global $slides_per_page;
  $per_page = $slides_per_page;

  if ((is_array($slides))&&(!empty($slides)))
  {
  $swp_key = array_slice(array_keys($slides), 0, 1);
  $first_key = array_shift($swp_key);
  }
  else
  $first_key = "";
  
  if (empty($slides)||(empty($first_key)))
    return array($slides , "", $lang[$current_lang]['Slides']['Slides']);
  
    $num_slides = count($slides);
    $num_pages = floor($num_slides/$per_page);
    
    if ($num_slides % $per_page == 0)$num_pages--;
    
    $page = (isset($_GET['pagesld'])) ? $_GET['pagesld'] : 0;
    
    ((array_key_exists('pagesld', $_GET))&&($_GET['pagesld'] == 'full')) ? $page = -1 : "";
    
    $actual_link = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
          $actual_link = preg_replace("/&pagesld=\d+/", "", $actual_link);
          $actual_link = preg_replace("/&pagesld=full/", "", $actual_link);
                    $actual_link = preg_replace("/&active=\d+/", "&active=1", $actual_link);

    if ($page == -1)
      {
      $slides_caption = $lang[$current_lang]['Slides']['All Slides'];
      $slides_new = $slides;
      }
      else
      {
      $slides_caption = $lang[$current_lang]['Slides']['Slides']." #".($page*$per_page+1)."-".(($page+1)*$per_page);
      $slides_new = array_slice($slides, $page*$per_page, $per_page);
      }

      $pagination = "<a href='".$actual_link."&pagesld=full'>".$lang[$current_lang]['Slides']['Show All']."</a><br><a href='".$actual_link."&pagesld=0'>".$lang[$current_lang]['Slides']['First']."</a> ";
      if ($page >= 1)$pagination .= "<a href='".$actual_link."&pagesld=".($page-1)."'>".$lang[$current_lang]['Slides']['Prev']."</a> ";
      for ($i=0; $i<=$num_pages; $i++)
        {
        if ($page == $i)
          $pagination .= "<a href='".$actual_link."&pagesld=".($i)."' style='font-weight:bold;'>".$lang[$current_lang]['Slides']['Slides']." #".($i*$per_page+1)."-".(($i+1)*$per_page)."</a> ";
          else
          $pagination .= "<a href='".$actual_link."&pagesld=".($i)."'>".$lang[$current_lang]['Slides']['Slides']." #".($i*$per_page+1)."-".(($i+1)*$per_page)."</a> ";
        }
      if (($page < $num_pages)&&($page != -1))$pagination .= "<a href='".$actual_link."&pagesld=".($page+1)."'>".$lang[$current_lang]['Slides']['Next']."</a> ";
      $pagination .= "<a href='".$actual_link."&pagesld=".$num_pages."'>".$lang[$current_lang]['Slides']['Last']."</a><br> ";

  return array($slides_new, $pagination, $slides_caption);
  }

public function execute($pid)
  {
  //Delete background image
    $this->delSlideData();
        
  //Mass action slide images
    $this->massActSlideData();
        
  //Save background image
    $slideid = $this->saveSlideData();

  //Load backgrounds
    $slide_info = '';//$this->getSlideData($pid);

  return array($slideid, $slide_info);
  }
}
?>