<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

class Model_Main extends Model{
private $table;
public function __construct($cachedb)
  {
  parent::__construct($cachedb);
    $this->table = $this->db->wpdb->prefix."simpleal_slider";
  }
public function getSliderQuery()
  {
  $tables = array('slides'=>$this->db->wpdb->prefix."simpleal_slides", 'images'=>$this->db->wpdb->prefix."simpleal_images",
                  'texts'=>$this->db->wpdb->prefix."simpleal_texts");

    $sql = "select slider.*, slider.id as sldrid, slider.name as sldrname, slider.width as sldrwidth, slider.height as sldrheight,
    '' as delim1,
    slides.*, slides.id as sldsid, slides.name as sldsname, '' delim2,
    img.*, img.url as imgurl, img.image as imgimage, img.id as imgid, img.name as imgname, img.slide_id as imgsldid, '' delim3,
    txt.*, txt.url as txturl, txt.id as txtid, txt.name as txtname, txt.width as txtwidth, txt.height as txtheight,
    txt.type as txttype, txt.image as txtimage, txt.slide_id as txtsldid, slides.name as txtsldname, '' delim4
    from ".$this->table." as slider left join ".$tables['slides']." as slides on (slider.id=slides.slider_id)
    left join ".$tables['images']." as img on (slides.id=img.slide_id) left join ".$tables['texts']." as txt 
    on (slides.id=txt.slide_id) where slider.id=%d order by slider.id, slides.id, img.id, txt.id";
    
    return $sql;
  }
public function get_main_results($id)
  {
  $sql = $this->getSliderQuery();

    $params = array($id,);
      $front = $this->db->fetchDataMain($sql, $params);

   return $front;
  }

}
?>