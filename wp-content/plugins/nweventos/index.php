<?php

/*
  Plugin Name: nweventos
  Description: Eventos / Talleres
  Author: Grupo Nw
  Version: 1.0.0
 */

function nweventos_options_panel() {
    add_menu_page('nweventos', 'nweventos', 'manage_options', 'nweventos', 'nweventos');
}

add_action('admin_menu', 'nweventos_options_panel');

function nweventos() {
    ini_set('session.cookie_domain', '.esm.loc');
    $lifetime = time() + 8600;
    session_set_cookie_params($lifetime, '/', '.esm.loc');
//    session_start();

    if (session_id() == "") {
        session_start();
    }
    $r = array();
    $r["id"] = "1";
    $r["nombre"] = "alexf";
    $r["usuario"] = "alexf";
    $r["terminal"] = "1";
    $r["nom_terminal"] = "1";
    $r["perfil"] = "1";
    $r["nom_perfil"] = "1";
    $r["cliente"] = "1";
    $r["email"] = "alexf@netwoods.net";
    $r["empresa"] = "1";
    $r["nom_empresa"] = "1";

//    if (isset($GLOBALS["sessionId"])) {
//        if ($GLOBALS["sessionId"] != "") {
    session_commit();
    session_id(1);
    session_start(1);
//        }
//    }

    $_SESSION["empresa"] = $r["empresa"];
    $_SESSION["nom_empresa"] = $r["nom_empresa"];
    setcookie("empresa", $r["empresa"], time() + (60 * 60 * 24 * 365));
    setcookie("nom_empresa", $r["nom_empresa"], time() + (60 * 60 * 24 * 365));

    $_SESSION["id"] = $r["id"];
    $_SESSION["id_usuario"] = $r["id"];
    $_SESSION["usuario_id"] = $r["id"];
    $_SESSION["nombre"] = $r["nombre"];
    $_SESSION["usuario"] = $r["usuario"];
    $_SESSION["terminal"] = $r["terminal"];
    $_SESSION["nom_terminal"] = $r["nom_terminal"];
    $_SESSION["perfil"] = $r["perfil"];
    $_SESSION["nom_perfil"] = $r["nom_perfil"];
    $_SESSION["cliente"] = $r["cliente"];
    $_SESSION["email"] = $r["email"];
//    print_r($_SESSION);
//    include_once $_SERVER['DOCUMENT_ROOT'] . "/nwlib6/basics/session.php";
//
//    $p = array();
//    $p["usuario"] = "alexf";
//    $p["clave"] = "alexf1223";
//
//    $p["empresa"] = 1;
//    $p["nom_empresa"] = 1;
//
//    nw_session::setEmpresa($p);
//    nw_session::consulta($p);

    $url = "http://eventos.escuelayneuroeducacion.co/";

    echo "<style>.iframeeventos{  position: absolute;
    width: 85%;
    height: 80%;
    left: 132px;
    position: fixed;}</style>";
    echo "<iframe src='{$url}' class='iframeeventos' ></iframe>";
}

?>
