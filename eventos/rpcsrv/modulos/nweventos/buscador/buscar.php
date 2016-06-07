<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/rpcsrv/_mod.inc.php";

$buscar = $_POST['b'];

if (!empty($buscar)) {
    buscar($buscar);
}

function buscar($b) {
    $db = NWDatabase::database();
    $ca = new NWDbQuery($db);
    $ca->prepareSelect("nweventos_colegios", "*", " nombre LIKE '%:nombre%' ");
    $ca->bindValue(":nombre", $b);
    if (!$ca->exec()) {
        echo "Error " . $ca->lastErrorText();
        return false;
    }
    $total = $ca->size();
    if ($total == 0) {
        echo "No se han encontrado resultados para '<b>" . $b . "</b>'.";
        return;
    }
    for ($i = 0; $i < $total; $i++) {
        $row = $ca->flush();

        $nombre = $row['nombre'];
        $id = $row['id'];

        echo "<div class='divResultNw' data-name='{$nombre}' data='{$id}' >{$nombre}</div>";
    }
}

?>