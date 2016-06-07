<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

class Model_Texts extends Model{
private $table;
public function __construct($db)
  {
  parent::__construct($db);
    $this->table = $this->db->wpdb->prefix."simpleal_texts";
  }
public function saveTextData($source)
  {
  for ($i = 0;$i < count($source['text_id']); $i++)
    {
    $src = array();
    $src_keys = array('name', 'url', 'text', 'slide_id', 'element_image', 'element_type', 'element_template', 'width',
    'height', 'offsetleft', 'offsettop', 'color', 'bgcolor', 'style', 'size', 'classes', 'image_elem_wp_id');
    foreach ($src_keys as $key)
      $src[$key] = $source[$key][$i];
      
      $id = $source['text_id'][$i];
      
    $filter = array(array('name', 'name', '%s'), array('url', 'url', '%s'),
            array('text', 'text', '%s'), array('slide_id', 'slide_id', '%d'),
            array('image', 'element_image', '%s'), array('type', 'element_type', '%d'),
            array('template', 'element_template', '%s'), array('width', 'width', '%d'), array('height', 'height', '%d'),
            array('offsetleft', 'offsetleft', '%d'), array('offsettop', 'offsettop', '%d'),
            array('color', 'color', '%s'), array('bgcolor', 'bgcolor', '%s'),
            array('style', 'style', '%s'), array('size', 'size', '%d'),
            array('classes', 'classes', '%s'), array('image_elem_wp_id', 'image_elem_wp_id', '%d')
            );
            
  if (!intval(sanitize_text_field($id)))return false;
  
  $idval = array('id' => intval(sanitize_text_field($id)));
  $idtype = array('%d');
  
   $this->db->saveData($this->table, $src, $filter, 'update', $idval, $idtype);
   }
   return true;
  }
public function insTextData($source)
  {
     $current_language = get_option( "simple_al_current_language" );
      global $lang;
      
      $languages = array('en-en', 'ru-ru');
      foreach ($languages as $cur_lang)
        {
        $funcname = "lang_init_".str_replace("-", "_", $cur_lang);
          $lang = $funcname($current_language, $lang);
        }
        
  $source['name'] = $lang[$current_language]['Elements']['Element']." #".uniqid();
  $filter = array(array('name', 'name', '%s'), array('url', 'url', '%s'),
            array('text', 'text', '%s'), array('slide_id', 'slide_id', '%d'),
            array('width', 'width', '%d'), array('height', 'height', '%d'),
            array('style', 'style', '%s')
            );

   $text_id = $this->db->saveData($this->table, $source, $filter, 'insert', null, null);
   
   return $text_id."::".$source['name'];
  }
public function getTextInfo($id)
  {
    return $this->db->fetchByVal($this->table, "slide_id", $id, '%d');
  }
public function getTextInfoFirst()
  {
    return $this->db->fetchFirst($this->table);
  }

public function delTextInfo($id)
  {
    return $this->db->deleteRow($this->table, "id", $id, '%d');
  }
public function massDelTextData($chk_ids)
  {
    return $this->db->massDeleteRows($this->table, 'id', $chk_ids);
  }

}
?>