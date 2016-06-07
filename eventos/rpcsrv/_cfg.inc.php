
<?php

//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE | E_STRICT );
//ini_set("display_errors", 1);

$cfg["dbDriver"] = "MYSQL";
//$cfg["dbDriver"] = "PGSQL";
$cfg["nwlibVersion"] = "6";

$hostname = (isset($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : exec("hostname");
if ($hostname == "eventos.esm.loc") {
    $cfg["appRoot"] = "/";
    $cfg["dbHost"] = "localhost";
//    $cfg["dbHost"] = "192.168.1.12";
    $cfg["dbName"] = "esm_eventos";
    $cfg["dbUser"] = "andresf";
    $cfg["dbPassword"] = "padre08";
//    $cfg["dbUser"] = "alexf";
//    $cfg["dbPassword"] = '$alexf#';
} else {
    $cfg["appRoot"] = "/";
//    $cfg["dbHost"] = "192.168.1.26";
    $cfg["dbHost"] = "192.168.1.12";
    $cfg["dbName"] = "esm_eventos";
    $cfg["dbUser"] = "alexf";
    $cfg["dbPassword"] = '$alexf#';
}
?>
