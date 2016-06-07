<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

//Settings for db queries cache 'TRUE - cache enabled'
$simpleal_cache_db = false;
//How long cache sql query data will be used till expired
$simpleal_cache_sql_expiration = 1800;

//Slides in per page mode
$slides_per_page = 6;

//Using pick color library (use - true, don't use - false)
$jquery_minicolors = true;

//For db upgrade
$simple_al_slider_db_version = "1.8";

?>