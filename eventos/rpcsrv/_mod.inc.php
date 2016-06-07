<?php

if (!session_id())
    session_start();

date_default_timezone_set("America/Bogota");

require_once dirname(__FILE__) . '/_cfg.inc.php';
if (!isset($cfg["nwlibVersion"])) {

    $cfg["nwlibVersion"] = "";
}
$_SESSION["nwlibVersion"] = $cfg["nwlibVersion"];
require_once dirname(__FILE__) . '/../nwlib' . $cfg["nwlibVersion"] . '/nwlib.inc.php';
NWLib::requireOnceModule('database/nwdb.inc.php');

NWLib::requireOnceModule('database/nwdbquery.inc.php');

$db = new NWDatabase();
$db->setDriver(NWDatabase::MYSQL);
//$db->setDriver(NWDatabase::PGSQL);
$db->setHostName($cfg["dbHost"]);

$db->setDatabaseName($cfg["dbName"]);
$db->setUserName($cfg["dbUser"]);
$db->setPassword($cfg["dbPassword"]);
$db->open_();
?>