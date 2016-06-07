<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

class Model_MainInfo extends Model{
private $table;
public function __construct($db)
  {
  parent::__construct($db);
    $this->table = $this->db->wpdb->prefix."simpleal_slider";
  }
public function saveMainData($source, $pid)
  {
  if (!isset($source['fullscreen'])) $source['fullscreen'] = 0;
  if (!isset($source['autoplay'])) $source['autoplay'] = 0;
  
  if (isset($source['effects_names']))
  $source['effects_names_gather'] = implode("***", $source['effects_names']);
    else
  $source['effects_names_gather'] = 'opacity';
  
  $filter = array(array('name', 'name', '%s'),
            array('width', 'width', '%d'), array('height', 'height', '%d'), array('duration', 'duration', '%d'),
            array('duration_effect', 'duration_effect', '%d'), array('duration_text_effect', 'duration_text_effect', '%d'),
            array('effect', 'effects_names_gather', '%s'), array('effect_direction', 'effect_direction', '%s'),
            array('apply_classes', 'apply_classes', '%s'), array('mask_file', 'mask_file', '%s'),
            array('fullscreen', 'fullscreen', '%d'), array('autoplay', 'autoplay', '%d')
            );
  if (!intval(sanitize_text_field($pid)))return false;
  
  $idval = array('id' => intval(sanitize_text_field($pid)));
  $idtype = array('%d');
  
   return $this->db->saveData($this->table, $source, $filter, 'update', $idval, $idtype);
  }
public function saveSettingsButtons($source, $pid)
  {
  $filter = array(array('settings_buttons', 'settings_buttons', '%d'),
   array('settings_buttons_width', 'settings_buttons_width', '%d'),
   array('settings_buttons_opacity', 'settings_buttons_opacity', '%d'),
   array('settings_buttons_top', 'settings_buttons_top', '%d')
   );
  if (!intval(sanitize_text_field($pid)))return false;
  
  $idval = array('id' => intval(sanitize_text_field($pid)));
  $idtype = array('%d');
  
   return $this->db->saveData($this->table, $source, $filter, 'update', $idval, $idtype);
  }

public function saveSettingsIndicators($source, $pid)
  {
  $filter = array(array('settings_indicators', 'settings_indicators', '%d'),
   array('settings_indicators_top', 'settings_indicators_top', '%d'),
   array('settings_indicators_width', 'settings_indicators_width', '%d'),
   array('settings_num_indicators', 'settings_num_indicators', '%d'));

  if (!intval(sanitize_text_field($pid)))return false;
  
  $idval = array('id' => intval(sanitize_text_field($pid)));
  $idtype = array('%d');
  
   return $this->db->saveData($this->table, $source, $filter, 'update', $idval, $idtype);
  }

public function createProject($name)
  {
  $name = sanitize_text_field($name);
    if (!$name) return false;
  
    $rowId = $this->db->insertRow($this->table,
                                  array('name' => $name, 'width' => 0, 'height' => 0,
                                   'effect' => 'default', 'effect_direction' => 'forward'),
                                  array('%s', '%d', '%d', '%s', '%s')
                                  );
    return $rowId;
  }
public function getProjects()
  {
    return $this->db->fetchAll($this->table, " name, id ");
  }
public function getMainInfo($id)
  {
  $tables = array('slides'=>$this->db->wpdb->prefix."simpleal_slides", 'images'=>$this->db->wpdb->prefix."simpleal_images",
                  'texts'=>$this->db->wpdb->prefix."simpleal_texts");
  $params = array($id);
    $sql = "select slider.*, slider.id as sldrid, slider.name as sldrname, slider.width as sldrwidth, slider.height as sldrheight,
    '' as delim1,
    slides.*, slides.id as sldsid, slides.name as sldsname, '' delim2,
    img.*, img.url as imgurl, img.image as imgimage, img.id as imgid, img.name as imgname, img.slide_id as imgsldid, '' delim3,
    txt.*, txt.url as txturl, txt.id as txtid, txt.name as txtname, txt.width as txtwidth, txt.height as txtheight, 
    txt.image as txtimage, txt.type as txttype, txt.slide_id as txtsldid, slides.name as txtsldname, '' delim4
    from ".$this->table." as slider left join ".$tables['slides']." as slides on (slider.id=slides.slider_id)
    left join ".$tables['images']." as img on (slides.id=img.slide_id) left join ".$tables['texts']." as txt 
    on (slides.id=txt.slide_id) where slider.id=%d order by slider.id, slides.id, img.id, txt.id";
    
    return $this->db->fetchData($sql, $params);
  }
public function delMainInfo($id)
  {
  $tables = array('slides'=>$this->db->wpdb->prefix."simpleal_slides", 'images'=>$this->db->wpdb->prefix."simpleal_images",
                  'texts'=>$this->db->wpdb->prefix."simpleal_texts");

  $params = array($id);
  $sql = "delete sldr.*, slds.*, imgs.*, txts.* from ".$this->table." as sldr left join ".$tables['slides']." as slds on (sldr.id=slds.slider_id) left join ".$tables['images']." as imgs on (imgs.slide_id=slds.id) left join ".$tables['texts']." as txts on (txts.slide_id=slds.id) where sldr.id=%d";

    $this->db->generalSql($sql, $params);

    return true;
  }
}
?>