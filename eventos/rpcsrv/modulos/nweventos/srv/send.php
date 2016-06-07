<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/rpcsrv/_mod.inc.php";
$db = NWDatabase::database();
$ca = new NWDbQuery($db);
$fecha = date("Y-m-d H:i:s");
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$cedula = $_POST["cedula"];
$celular = $_POST["celular"];
$institucion_id = $_POST["data_result_search"];
$institucion = $_POST["data_result_search_text"];
$codigo = $_POST["codigo"];
$tipo = $_POST["tipo"];
$cargo = $_POST["cargo"];
$pruebas = false;

////////////////////7validación de colegio y código////////////////////
if ($tipo == "colegios") {
    $ca->prepareSelect("nweventos_codigos a left join nweventos_colegios b ON (a.colegio=b.id)", "a.id,b.ciudad,b.delegacion,b.cod_dane", " a.colegio=:colegio and a.activo='SI' and codigo=:codigo ");
    $ca->bindValue(":colegio", $institucion_id);
    $ca->bindValue(":codigo", $codigo);
    if (!$ca->exec()) {
        print json_encode("Error " . $ca->lastErrorText());
        return false;
    }
    $total = $ca->size();
    if ($total == 0) {
        print json_encode("El colegio seleccionado no coincide con su registro o el codigo no es valido, intentelo nuevamente.");
        return false;
    }
    $r = $ca->flush();
}
////////////////////inactivación del código////////////////////
if (!$pruebas) {
    $ca->prepareUpdate("nweventos_codigos", "activo", "codigo=:codigo ");
    $ca->bindValue(":activo", "NO");
    $ca->bindValue(":codigo", $codigo);
    if (!$ca->exec()) {
        print json_encode("Error " . $ca->lastErrorText());
        return false;
    }
}

$fields = "nombre,fecha_registro,email,cedula,celular,institucion_o_empresa,tipo,codigo,cargo";
if ($tipo == "empresas") {
    $fields .= ",pais,ciudad";
}
if ($tipo == "colegios") {
    $fields .= ",ciudad_colegio,delegacion_colegio,dane_colegio";
}
$ca->prepareInsert("nweventos_registrados", $fields);
$ca->bindValue(":nombre", $nombre);
$ca->bindValue(":fecha_registro", $fecha);
$ca->bindValue(":email", $email);
$ca->bindValue(":cedula", $cedula);
$ca->bindValue(":celular", $celular);
$ca->bindValue(":institucion_o_empresa", $institucion);
$ca->bindValue(":tipo", $tipo);
$ca->bindValue(":codigo", $codigo);
$ca->bindValue(":cargo", $cargo);
if ($tipo == "empresas") {
    $ca->bindValue(":pais", $_POST["pais"]);
    $ca->bindValue(":ciudad", $_POST["ciudad"]);
}
if ($tipo == "colegios") {
    $ca->bindValue(":ciudad_colegio", $r["ciudad"]);
    $ca->bindValue(":delegacion_colegio", $r["delegacion"]);
    $ca->bindValue(":dane_colegio", $r["cod_dane"]);
}
if (!$ca->exec()) {
    print json_encode("Error " . $ca->lastErrorText());
    return false;
}
print json_encode("OK");
return true;
?>