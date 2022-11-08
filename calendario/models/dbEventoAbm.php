<?php
require_once "../../lib/database.php";

$db = conectarDB();

$eventoFecha       = isset($_POST['eventoFecha'])       ? mysqli_real_escape_string($db, $_POST['eventoFecha'])       : '';
$eventoHora        = isset($_POST['eventoHora'])        ? mysqli_real_escape_string($db, $_POST['eventoHora'])        : '';
$eventoTitulo      = isset($_POST['eventoTitulo'])      ? mysqli_real_escape_string($db, $_POST['eventoTitulo'])      : '';
$eventoDescripcion = isset($_POST['eventoDescripcion']) ? mysqli_real_escape_string($db, $_POST['eventoDescripcion']) : '';
$eventoId          = isset($_POST['eventoId'])          ? mysqli_real_escape_string($db, $_POST['eventoId'])          : '';

if($_POST['type'] == 'A') {
    $query = "INSERT INTO
            eventos
        SET
            eventoFecha       = '$eventoFecha',
            eventoHora        = '$eventoHora',
            eventoTitulo      = '$eventoTitulo',
            eventoDescripcion = '$eventoDescripcion'";
    
    try {
        mysqli_query($db, $query);
        header("Location: /calendario-app/calendario/controllers/guiCalendario.php?ok=true");
    } catch (\Throwable $th) {
        header("Location: /calendario-app/calendario/controllers/guiCalendario.php?ok=false");
    }
}


if($_POST['type'] == 'U') {
    $query = "UPDATE
                eventos
            SET
                eventoFecha       = '$eventoFecha',
                eventoHora        = '$eventoHora',
                eventoTitulo      = '$eventoTitulo',
                eventoDescripcion = '$eventoDescripcion'
            WHERE
                eventoId = '$eventoId'";

    try {
        mysqli_query($db, $query);
        header("Location: /calendario-app/calendario/controllers/guiCalendario.php?ok=true");
    } catch (\Throwable $th) {
        header("Location: /calendario-app/calendario/controllers/guiCalendario.php?ok=false");
    }
}


if($_POST['type'] == 'D') {
    $query = "DELETE FROM
                eventos
            WHERE
                eventoId = '$eventoId'";

    try {
        mysqli_query($db, $query);
        header("Location: /calendario-app/calendario/controllers/guiCalendario.php?ok=true");
    } catch (\Throwable $th) {
        header("Location: /calendario-app/calendario/controllers/guiCalendario.php?ok=false");
    }
}