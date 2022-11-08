<?php 
require_once "../../lib/database.php";

$db = conectarDB();

$query = "SELECT
            eventoId     AS id,
            eventoTitulo AS title,
            eventoFecha  AS start
        FROM 
            eventos";

try {
    $resultEventos = mysqli_query($db, $query);
    $eventos = json_encode(mysqli_fetch_all($resultEventos, MYSQLI_ASSOC)); 
    $datosRecuperados = true; 
} catch (\Throwable $th) {
    $eventos = json_encode(array());
    $datosRecuperados = false;
}

require_once "../views/guiCalendario.html";