<?php
namespace simpleal;

defined('ABSPATH') or die("No script hack please!");

//Common settings
require_once dirname(__FILE__).'/../cfg/cfg.php';

//Common
if (!class_exists('Sial_Base'))
require_once dirname(__FILE__).'/base.class.php';

if (!class_exists('Sial_Admin_Common'))
require_once dirname(__FILE__).'/admincommon.class.php';

if (!class_exists('Sial_Db'))
require_once dirname(__FILE__).'/db.class.php';

if (!class_exists('Sial_View'))
require_once dirname(__FILE__).'/view.class.php';

if (!class_exists('Sial_Controller'))
require_once dirname(__FILE__).'/controller.class.php';

if (!class_exists('Sial_Model'))
require_once dirname(__FILE__).'/model.class.php';

if (!class_exists('Sial_Helper'))
require_once dirname(__FILE__).'/helper.php';

if (!class_exists('Slider_Widget'))
require_once dirname(__FILE__).'/widget_slider.class.php';

//Models
if (!class_exists('Model_MainInfo'))
require_once dirname(__FILE__).'/../admin_classes/models/main_info.php';

if (!class_exists('Model_BgImages'))
require_once dirname(__FILE__).'/../admin_classes/models/bg_images.php';

if (!class_exists('Model_Slides'))
require_once dirname(__FILE__).'/../admin_classes/models/slides.php';

if (!class_exists('Model_Texts'))
require_once dirname(__FILE__).'/../admin_classes/models/texts.php';

//Controllers
if (!class_exists('Controller_MainInfo'))
require_once dirname(__FILE__).'/../admin_classes/controllers/main_info.php';

if (!class_exists('Controller_BgImages'))
require_once dirname(__FILE__).'/../admin_classes/controllers/bg_images.php';

if (!class_exists('Controller_Slides'))
require_once dirname(__FILE__).'/../admin_classes/controllers/slides.php';

if (!class_exists('Controller_Texts'))
require_once dirname(__FILE__).'/../admin_classes/controllers/texts.php';

//Additional
require_once dirname(__FILE__).'/actions.php';

//Languages
require_once dirname(__FILE__).'/../local/en-en.php';//English
require_once dirname(__FILE__).'/../local/ru-ru.php';//Russian
?>