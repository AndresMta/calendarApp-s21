<?php
require_once "../../lib/database.php";

$db = conectarDB();

$eventoId = mysqli_real_escape_string($db, $_GET['id']);

$query = "SELECT
            eventoFecha,
            eventoHora,
            eventoTitulo,
            eventoDescripcion
        FROM
            eventos
        WHERE
            eventoId = '$eventoId'";

try {
    $resultEvento = mysqli_query($db, $query);
    
    if(mysqli_num_rows($resultEvento) == 0) {
        header("Location: /calendario-app?ok=false");
    }

    $evento = mysqli_fetch_all($resultEvento, MYSQLI_ASSOC)[0];
} catch (\Throwable $th) {
    header("Location: /calendario-app?ok=false");
}


require_once "../views/guiEvento.html";