<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/rpcsrv/_mod.inc.php";

function bodyAll($code, $tipo) {
    print "<form id='nwevents' action='javascript: sendEvent()' method='post'>";

    print form1($code, $tipo);

    print "<h3 class='titleseleccione'>Seleccione el evento</h3>";

    print nweventos();

    print "<div class='divreservar'><input type='submit' value='Reservar' /></div>";

    print "</form>";
}

function checkCode($code) {
    $db = NWDatabase::database();
    $ca = new NWDbQuery($db);
    $ca->prepareSelect("nweventos_codigos", "*", "codigo=:codigo and activo='SI' ");
    $ca->bindValue(":codigo", $code);
    if (!$ca->exec()) {
        echo "Error " . $ca->lastErrorText();
        return false;
    }
    $total = $ca->size();
    if ($total == 0) {
        echo "<script>dialogCodeNone();</script>";
        return false;
    }
    $r = $ca->flush();

    return bodyAll($r["codigo"], $r["tipo"]);
}

function bodyEventos() {
    $db = NWDatabase::database();
    $ca = new NWDbQuery($db);
    $ca->prepareSelect("nweventos_enc", "*", "1=1");
    if (!$ca->exec()) {
        return "Error " . $ca->lastErrorText();
    }
    $total = $ca->size();
    if ($total == 0) {
        return "No hay eventos configurados";
    }
    $rta = "<div class='containEventAll'>";
    for ($i = 0; $i < $total; $i++) {
        $r = $ca->flush();
        $rta .= "<div class='containEvent'>";
        $rta .= "<div class='containEventInt'>";
        $rta .= "<div class='containEventImg' style='background-image: url({$r["imagen"]});' ></div>";

        $rta .= "<div class='containEventDescription'>";
        $rta .= "<div class='containEventTitle'>{$r["nombre"]} </div>";
        $rta .= $r["descripcion"];
        $rta .= "</div>";

        $rta .= "</div>";
        $rta .= "</div>";
    }

    $rta .= "<div class='containButtonReservaYa' >";
    $rta .= "<div class='buttonReservaYa' >Reserva Ahora</div>";
    $rta .= "</div>";

    $rta .= "</div>";
    return $rta;
}

function bodyCode() {
    include "forms/code.php";
}

function scriptsNwEventos() {
    echo "<link rel='stylesheet' id='jquery-ui-css'  href='css/style.css' type='text/css' media='all' />";
    echo "<link rel='stylesheet' id='jquery-ui-css'  href='css/media.css' type='text/css' media='all' />";
    echo "<link rel='stylesheet' id='jquery-ui-css'  href='js/jquery/jquery-ui-1.8.16.custom.css' type='text/css' media='all' />";
    echo "<script type='text/javascript' src='js/jquery/jquery.min.js'></script>";
    echo "<script type='text/javascript' src='js/jquery/jquery-ui.min.js'></script>";
    echo "<script type='text/javascript' src='js/nweventos.js'></script>";
}

function nweventos() {
    $db = NWDatabase::database();
    $ca = new NWDbQuery($db);
    $ca->prepareSelect("nweventos_enc", "*", "1=1");
    if (!$ca->exec()) {
        echo "Error " . $ca->lastErrorText();
        return false;
    }
    $total = $ca->size();
    if ($total == 0) {
        echo "No hay eventos";
        return false;
    }
    $rta = "<ul>";
    for ($i = 0; $i < $total; $i++) {
        $r = $ca->flush();
        $rta .= "<li class='linivel1'>";
        $rta .= "<span class='titleevent'>" . $r["nombre"] . " </span>";
        $rta .= nweventosSessiones($r["id"]);
        $rta .= "<div class='clear'></div>";
        $rta .= "</li>";
        $rta .= "<div class='clear'></div>";
    }
    $rta .= "<div class='clear'></div>";
    $rta .= "</ul>";
    return $rta;
}

function getMonthByDate($date) {
    $date = explode("-", $date);
    return monthsArray($date[1]);
}

function monthsArray($month) {
    $rta = array();
    $rta["01"] = "Enero";
    $rta["02"] = "Febrero";
    $rta["03"] = "Marzo";
    $rta["04"] = "Abril";
    $rta["05"] = "Mayo";
    $rta["06"] = "Junio";
    $rta["07"] = "Julio";
    $rta["08"] = "Agosto";
    $rta["09"] = "Septiembre";
    $rta["10"] = "Octubre";
    $rta["11"] = "Noviembre";
    $rta["12"] = "Diciembre";
    if ($month != false && $month != NULL) {
        return $rta[$month];
    } else {
        return $rta;
    }
}

function getDayNumberByDate($date) {
    $day = date("d", strtotime($date));
    return $day;
}

function getDayNameByDate($date) {
    $day = date("N", strtotime($date));
    return daysArray($day);
}

function daysArray($day) {
    $rta = array();
    $rta["1"] = "Lunes";
    $rta["2"] = "Martes";
    $rta["3"] = "Miércoles";
    $rta["4"] = "Jueves";
    $rta["5"] = "Viernes";
    $rta["6"] = "Sábado";
    $rta["7"] = "Domingo";
    if ($day != false && $day != NULL) {
        return $rta[$day];
    } else {
        return $rta;
    }
}

function getYearByDate($date) {
    $rta = date("Y", strtotime($date));
//    return $rta;
    return;
}

function getActualAsist($id) {
    $db = NWDatabase::database();
    $ca = new NWDbQuery($db);
    $ca->prepareSelect("nweventos_reservas", "id", "sesion_horario=:id");
    $ca->bindValue(":id", $id);
    if (!$ca->exec()) {
        echo "Error " . $ca->lastErrorText();
        return false;
    }
    $total = $ca->size();
    return $total;
}

function nweventosSessiones($id) {
    $db = NWDatabase::database();
    $ca = new NWDbQuery($db);
    $ca->prepareSelect("nweventos_sesiones", "*", "id_enc=:id order by fecha_sesion asc");
    $ca->bindValue(":id", $id);
    if (!$ca->exec()) {
        echo "Error " . $ca->lastErrorText();
        return false;
    }
    $total = $ca->size();
    if ($total == 0) {
        echo "No hay eventos";
        return false;
    }
    $rta = "<ul class='sesiones'>";

    $width = 100 / $total;

    for ($i = 0; $i < $total; $i++) {
        $r = $ca->flush();
        $maxAsist = $r["cantidad_asistentes"];
        $actualAsist = getActualAsist($r["id"]);

        $date = $r["fecha_sesion"];
        $year = getYearByDate($date);
        $mes = getMonthByDate($date);
        $dia = getDayNumberByDate($date);

        $horamodo = 0;
        if ($r["modo_horario"] == "a.m") {
            $horamodo = 1;
        }
        $hora_inicial = $r["hora_inicial"] . $horamodo;
        $hora_final = $r["hora_final"] . $horamodo;

        $dataInput = $date . $hora_inicial . $hora_final;
        $dataInput = str_replace("-", "", $dataInput);
        $dataInput = str_replace(":", "", $dataInput);

        $rta .= "<li style='width: {$width}%;' >";
        $rta .= "<span><strong>{$year} {$mes} {$dia} </strong></span>";
        $rta .= "<span>{$r["hora_inicial"]}{$r["modo_horario"]} - {$r["hora_final"]}{$r["modo_horario"]}</span>";
        $rta .= "<input type='checkbox' class='hourEvents event_{$dataInput}' data='{$dataInput}' max-asist='{$maxAsist}' actual-asist='{$actualAsist}' data-evento='{$id}' data-sesion='{$r["id"]}'  name='button_$id' id='button_$i' ></option>";
        $rta .= "</li>";
    }
    $rta .= "<div class='clear'></div>";
    $rta .= "</ul>";
    return $rta;
}

function getTable($table) {
    $db = NWDatabase::database();
    $ca = new NWDbQuery($db);
    $ca->prepareSelect($table, "*", "1=1");
    if (!$ca->exec()) {
        echo "Error " . $ca->lastErrorText();
        return false;
    }
    $total = $ca->size();
    if ($total == 0) {
        echo "No hay eventos";
        return false;
    }
    $rta = "<datalist id='listas_usuarios_nombres'>";
    for ($i = 0; $i < $total; $i++) {
        $r = $ca->flush();
        $rta .= "<option class='userLister' value='{$r["nombre"]}'>{$r["nombre"]}</option>";
    }
    $rta .= "  </datalist>";
    return $rta;
}

function form1($code, $tipo) {
    include "forms/form.php";
}

?>