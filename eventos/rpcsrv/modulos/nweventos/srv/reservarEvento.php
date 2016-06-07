<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/rpcsrv/_mod.inc.php";
$db = NWDatabase::database();
$ca = new NWDbQuery($db);
$fecha = date("Y-m-d H:i:s");
$fields = "evento,sesion_horario,documento,fecha_registro";
$documento = $_POST["documento"];
$eventos = $_POST["eventos"];

if (count($eventos) > 0) {
    foreach ($eventos as $r) {
        $ca->prepareInsert("nweventos_reservas", $fields);
        $ca->bindValue(":evento", $r["evento"]);
        $ca->bindValue(":sesion_horario", $r["sesion"]);
        $ca->bindValue(":documento", $documento);
        $ca->bindValue(":fecha_registro", $fecha);
        if (!$ca->exec()) {
            print json_encode("Error " . $ca->lastErrorText());
            return false;
        }
    }
}

//////////////////////////////////////////////////////ENVÍO DE CORREO////////////////////////////////////////
$eventos_mail = "";
$ca->prepareSelect("nweventos_registrados", "*", "cedula=:documento ");
$ca->bindValue(":documento", $documento);
if (!$ca->exec()) {
    print json_encode("Error " . $ca->lastErrorText());
    return false;
}
if ($ca->size() == 0) {
    print json_encode("No está inscrito.");
    return false;
}
$cx = $ca->flush();
$nombre = $cx["nombre"];
$email = $cx["email"];
$institucion = $cx["institucion_o_empresa"];

//$ca->prepareSelect("nweventos_reservas a left join nweventos_sesiones b on (a.sesion_horario=b.id)", "b.nombre as nombre_evento, b.fecha_sesion as fecha_evento, b.hora_inicial, b.hora_final ", "a.documento=:documento ");
$ca->prepareSelect("nweventos_reservas a 
                                   left join nweventos_sesiones b on (a.sesion_horario=b.id) 
                                   left join nweventos_enc c on(a.evento=c.id)", "c.nombre as nombre_evento, b.fecha_sesion as fecha_evento, b.hora_inicial, b.hora_final ", "a.documento=:documento ");
$ca->bindValue(":documento", $documento);
if (!$ca->exec()) {
    print json_encode("Error " . $ca->lastErrorText());
    return false;
}
if ($ca->size() > 0) {
    $eventos_mail .= "<ul>";
    for ($i = 0; $i < $ca->size(); $i++) {
        $m = $ca->flush();
        $eventos_mail .= "<<li><b>{$m["nombre_evento"]}:</b> <b>Horario:</b> {$m["fecha_evento"]}. <b>Horario:</b> {$m["hora_inicial"]} - {$m["hora_final"]}. </li>";
    }
    $eventos_mail .= "</ul>";
}

$asunto = "I Foro sobre escuela y neuroeducación";

$textBody = "<p>Estimado {$nombre}</p>";
$textBody .= "<p>Agradecemos la confirmación de su participación al I Foro de Reflexión sobre Escuela y Neuroeducación en representación de <b>{$institucion}</b>. </p>";
$textBody .= "<p>Usted quedó registrado para participar en los talleres: </p>";
$textBody .= $eventos_mail;
$textBody .= "<p>Dirección del Centro de Convenciones AR. Calle 113 No. 7-21. </p>";
$textBody .= "<p>Nota: (solo aplica para Bogotá) Si usted asiste en vehículo particular, podrá hacer uso del convenio que tenemos con el parqueadero del Hotel NH Collection Teleport, el cual no le generará cobro.</p>";
$textBody .= "<p>Si tiene dudas o comentarios puede visitar la página web www.escuelayneuroeducacion.co o escribanos al correo electrónico somosmaestros@grupo-sm.com </p>";

if (!nw_configuraciones::sendEmail($email, $nombre, $asunto, $asunto, $textBody, "somosmaestros@grupo-sm.com")) {
    print json_encode("Error al enviar el correo");
    return false;
}

return true;
?>