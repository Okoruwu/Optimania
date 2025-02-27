<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/sesion.php");

if (($UserData['rol']) > 2) {
    setcookie("msg", "sad", time() + 2, "/");
    header('Location: /');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d H:i:s");

if (isset($_REQUEST['delId']) and $_REQUEST['delId'] != "") {

    $DelProd = $db->getAllRecords('promociones', '*', 'AND id=' . ($_REQUEST['delId']) . '', 'LIMIT 1');
    if (empty($DelProd)) {
        setcookie("msg", "ups", time() + 2, "/");
        header('location:/admin/promociones');
        exit;
    }
    $DelProd = $DelProd[0];

    if (isset($DelProd['foto'])) {
        $archivo = '../../upload/promociones/' . (strftime("%Y/%m", strtotime(($DelProd['fr'])))) . '/' . ($DelProd['foto']) . '.jpg';
        unlink($archivo); //BORRAMOS LA FOTO ANTIGUA SACANDO EL NOMBRE DE LA BASE DE DATOS
    }



    $db->delete('promociones', array('id' => $_REQUEST['delId']));

    setcookie("msg", "proddel", time() + 2, "/");
    header('location: /admin/productos');
    exit;
}
