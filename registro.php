<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/funciones.php");

if (isset($_SESSION['UserId'])) {

    setcookie("msg", "ylog", time() + 1, "/");
    header("location: /");
    exit;
}



date_default_timezone_set('America/Mazatlan');
$fecha = date("Y-m-d H:i:s");


if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);

    if (($nombre == "") & ($email == "") & ($password == "")) {
        setcookie("msg", "all", time() + 1, "/");
        header('location: /registro?msg=all');
        exit;
    } else {


        //BERIFICAMOS SI EL CORREO YA EXISTE
        $EmailEx =    $db->getAllRecords('usuarios', '*', ' AND email="' . $email . '" LIMIT 1 ');

        if (!($EmailEx)) {

            if (empty($_REQUEST['suscrito'])) {
                $suscrito = 0;
            }


            $userCount    =    $db->getQueryCount('usuarios', 'id');
            if ($userCount[0]['total'] < 10000) {
                $data    =    array(
                    'nombre' => $nombre,
                    'email' => $email,
                    'fr' => $fecha,
                    'pass' => $password,
                    'rol' => "3",

                );
                $insert    =    $db->insert('usuarios', $data);
                if ($insert) {

                    $nombreSMTP = $nombre;
                    $correoSMTP = $email;

                    //CONFIRMACION DE COMPRA PSS: Oym.)%%]]jPe EMAIL: info@elshowdelasalud.com
                    //CONFIRMACION DE COMPRA PSS: Oym.)%%]]jPe EMAIL: info@elshowdelasalud.com
                    //require_once($_SERVER["DOCUMENT_ROOT"] . "/include/confirmacionRegistro.php");
                    //CONFIRMACION DE COMPRA PSS: Oym.)%%]]jPe EMAIL: info@elshowdelasalud.com
                    //CONFIRMACION DE COMPRA PSS: Oym.)%%]]jPe EMAIL: info@elshowdelasalud.com

                    setcookie("msg", "rok", time() + 1, "/");
                    header('location: /acceder?ok');
                    exit;
                } else {
                    setcookie("msg", "ups", time() + 1, "/");
                    header('location: /registro?ups');
                    exit;
                }
            } else {
                setcookie("msg", "rlim", time() + 1, "/");
                header('location: /registro?lim');
                exit;
            }
        } else {
            setcookie("msg", "mailex", time() + 1, "/");
            header('location: /registro?mailex');
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optimania</title>
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/css.php"); ?>
</head>

<body>
    <div class="ps-page">

        <?php
        //MENSAJES DE ESTATUS
        if (isset($_COOKIE["msg"])) {
            require_once($_SERVER["DOCUMENT_ROOT"] . "/include/msg.php");
        } ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/header.php"); ?>


        <section style="background-color: #fff;" class="ps-banner--round pt-40 mb-50">
            <div class="container mt-4 mb-4">

                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 style="font-weight: 800; color: #33b1e3;" class="ps-banner__title">Registrate
                        </h4>

                        <div class="row justify-content-center ">
                            <div class="col-sm-12 col-md-3">

                                <form method="POST" action="/registro/">
                                    <div class="ps-form--contact">
                                        <div class="row justify-content-center ">
                                            <div class="col-12">
                                                <div class="ps-form__group">
                                                    <input class="form-control ps-form__input" type="text" name="nombre" placeholder="Nombre">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="ps-form__group">
                                                    <input class="form-control ps-form__input" type="email" name="email" placeholder="Correo de usuario">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="ps-form__group">
                                                    <input class="form-control ps-form__input" type="password" name="password" placeholder="Contraseña">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button class="w-100 ps-btn ps-btn--warning" type="submit" value="submit" name="submit">Registrate</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <p style="font-size: 18px; font-weight: 800; color: #f18500;">Ya tienes una cuenta? <a style="font-size: 18px; font-weight: 800; color: #33b1e3;" href="/acceder">Inicia Sesión!</a></p>
                    </div>
                </div>



            </div>
        </section>

        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/agendar.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/footer.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/js.php"); ?>


</body>



</html>