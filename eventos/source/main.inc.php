<?php

ob_start("ob_gzhandler");
$file = dirname('__FILE__') . '/script/esm.js';
header('Content-Type: application/x-javascript');
header('Last-Modified: ' . date(DATE_RFC822, filemtime($file)));
header('Expires: ' . date(DATE_RFC822, time() + 3600 * 24));
header('Cache-Control: store');
echo file_get_contents($file);
die;
?>