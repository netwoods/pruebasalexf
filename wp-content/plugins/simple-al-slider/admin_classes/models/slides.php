<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

class Model_Slides extends Model{
private $table;
public function __construct($db)
  {
  parent::__construct($db);
    $this->table = $this->db->wpdb->prefix."simpleal_slides";
  }
public function saveSlideData($source)
  {
  for ($i = 0;$i < count($source['slide_id']); $i++)
    {
    $src = array();
    
    $src_keys = array('slide_name');
    foreach ($src_keys as $key)
      $src[$key] = $source[$key][$i];
      
      $id = $source['slide_id'][$i];

  $filter = array(array('name', 'slide_name', '%s')/*, array('num', 'num', '%d')*/
            );
  if (!intval(sanitize_text_field($id)))return false;
  
  $idval = array('id' => intval(sanitize_text_field($id)));
  $idtype = array('%d');
  
  $this->db->saveData($this->table, $src, $filter, 'update', $idval, $idtype);
    }
   return true;
  }
public function insSlideData($source)
  {
  $source['num'] = 0;
  //file_put_contents("1111.txt", serialize($source));
  $filter = array(array('name', 'slide_name', '%s'), array('num', 'num', '%d'), array('slider_id', 'slider_id', '%d')
            );

   return $this->db->saveData($this->table, $source, $filter, 'insert', null, null);
  }
public function getSlideInfo($id)
  {
    return $this->db->fetchByVal($this->table, "slider_id", $id, '%d');
  }
public function getSlideInfoFirst()
  {
    return $this->db->fetchFirst($this->table);
  }

public function delSlideInfo($id)
  {
  $tables = array('slides'=>$this->db->wpdb->prefix."simpleal_slides", 'images'=>$this->db->wpdb->prefix."simpleal_images",
                  'texts'=>$this->db->wpdb->prefix."simpleal_texts");

  $params = array($id);
  $sql = "delete slds.*, imgs.*, txts.* from ".$this->table." as slds left join ".$tables['images']." as imgs on (imgs.slide_id=slds.id) left join ".$tables['texts']." as txts on (txts.slide_id=slds.id) where slds.id=%d";
    $this->db->generalSql($sql, $params);

    return true;
  }
public function massDelSlideData($chk_ids)
  {
  foreach ($chk_ids as $id)
    {
      $this->delSlideInfo($id);
    }
   return true;
  }

}
?>