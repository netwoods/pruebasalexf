<?php

class colegios {

    public static function makeCodes($p) {
        session::check();
        $db = NWDatabase::database();
        $ca = new NWDbQuery($db);
        $si = session::getInfo();
        for ($y = 0; $y < count($p["detalle"]); $y++) {
            for ($i = 0; $i < $p["n_codigos"]; $i++) {
                $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $su = strlen($an) - 1;
                $codigo = substr($an, rand(0, $su), 1) . substr($an, rand(0, $su), 1) . substr($an, rand(0, $su), 1) . substr($an, rand(0, $su), 1) . substr($an, rand(0, $su), 1) . substr($an, rand(0, $su), 1);
                $sql = "SELECT * from nweventos_codigos where codigo=:codigo";
                $ca->bindValue(":codigo", $codigo);
                $ca->prepare($sql);
                if (!$ca->exec()) {
                    NWJSonRpcServer::error("Error ejecutando la consulta: " . $ca->preparedQuery());
                    return false;
                }
                if ($ca->size() > 0) {
                    continue;
                } else {
                    $fields = "codigo,tipo,fecha_caducidad,usuario,activo";
                    if ($p["tipo"] == "colegios") {
                        $fields.=",colegio";
                    }
                    $ca->prepareInsert("nweventos_codigos", $fields);
                    $ca->bindValue(":codigo", $codigo);
                    $ca->bindValue(":tipo", $p["tipo"]);
                    $ca->bindValue(":usuario", $si["usuario"]);
                    $ca->bindValue(":activo", 'SI');
                    if ($p["tipo"] == "colegios") {
                        $ca->bindValue(":colegio", $p["detalle"][$y]["id"]);
                    }
                    $ca->bindValue(":fecha_caducidad", $p["fecha_caducidad"], true, true);
                    if (!$ca->exec()) {
                        NWJSonRpcServer::error("Error ejecutando la consulta: " . $ca->preparedQuery());
                        return false;
                    }
                }
            }
        }
        return true;
    }

    public static function populate($p) {
        session::check();
        $db = NWDatabase::database();
        $ca = new NWDbQuery($db);
        $si = session::getInfo();
        $sql = "select id,nombre from ciudades where empresa=:empresa order by nombre";
        $ca->prepare($sql);
        $ca->bindValue(":empresa", $si["empresa"]);
        if (!$ca->exec()) {
            NWJSonRpcServer::error("Error ejecutando la consulta: " . $ca->preparedQuery());
            return false;
        }
        return $ca->assocAll();
    }

    public static function populateTokenField($p) {
        session::check();
        $db = NWDatabase::database();
        $ca = new NWDbQuery($db);
        $si = session::getInfo();
        $where = "";
        if ($p != "") {
            $where .= " and lower(nombre) like lower('%:nombre%')";
        }
        $sql = "select id,nombre from ciudades where empresa=:empresa $where order by nombre";
        $ca->prepare($sql);
        $ca->bindValue(":empresa", $si["empresa"]);
        $ca->bindValue(":nombre", $p);
        if (!$ca->exec()) {
            NWJSonRpcServer::error("Error ejecutando la consulta: " . $ca->preparedQuery());
            return false;
        }
        return $ca->assocAll();
    }

}

?>