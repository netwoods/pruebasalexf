<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

class Sial_CacheDb extends Sial_Db{
public function __construct()
  {
  if (method_exists(get_parent_class(), '__construct'))
      parent::__construct();
  }
public function fetchDataMain($sql, $params)
  {
  global $simpleal_cache_db;
  global $simpleal_cache_sql_expiration;
  $fullSql = $this->wpdb->prepare($sql, $params);
    if (!($simpleal_cache_db)||(($cache = wp_cache_get( $fullSql, 'simpleal_main_front' )) === false))
      {
        $data = $this->filterMainData($this->fetchDatafullQuery($fullSql));
          wp_cache_add( $fullSql, $data, 'simpleal_main_front', $simpleal_cache_sql_expiration );
          return $data;
      }
      else
      {
        return $cache;
      }
  }
public function filterMainData($data)
  {
    return $this->prepear_front($data);
  }
public function prepear_front($data)
  {
  $main = array();

    foreach ($data as $dt)
      {
      $fl = false;
      $fl2 = false;
      $fl3 = false;
          foreach ($dt as $key=>$val)
            {
              if ($key == 'delim1')$fl = true;
              if ($key == 'delim2'){$fl2 = true; $fl=false;}
              if ($key == 'delim3'){$fl3 = true;$fl2 = false; $fl=false;}

              if (isset($val))
              if ($fl)
                {
                  $main['slides_info'][$dt->sldsid][$key] = $val;
                }
                elseif (($fl2)&&(isset($dt->imgid)))
                {
                  $main['slides_info'][$dt->sldsid]['imgs'][$key] = $val;
                }
                elseif (($fl3)&&(isset($dt->txtid)))
                {
                  $main['slides_info'][$dt->sldsid]['texts'][$dt->txtid][$key] = $val;
                }
                else
                {
                  $main['slider'][$key] = $val;
                }
            }
      }
   return $main;
  }

}
?>