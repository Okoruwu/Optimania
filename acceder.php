<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");

if (isset($_SESSION['UserId'])) {

    setcookie("msg", "ylog", time() + 1, "/");
    header("location: /");
    exit;
}

try {
    $connect = new PDO("mysql:host=" . SS_DB_HOST . "; dbname=" . SS_DB_NAME . "", SS_DB_USER, SS_DB_PASSWORD);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST["submit"])) {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            setcookie("msg", "all", time() + 1, "/");
            header("location: /acceder?inv");
        } else {
            $query = "SELECT * FROM usuarios WHERE email = :email AND pass = :password";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'email'     => $_POST["email"],
                    'password'  => $_POST["password"],
                )
            );
            $count = $statement->rowCount();
            if ($count > 0) {

                //ESTABLECEMOS LA HORA IGUAL QUE EN LOS CABOS
                date_default_timezone_set('America/Mazatlan');
                $fecha = date("Y-m-d H:i:s");
                //OBTENEMOS DATOS DE USUARIO
                $UserData =     $db->getAllRecords('usuarios', '*', ' AND email="' . ($_POST["email"]) . '"LIMIT 1 ');
                $UserData = $UserData[0];
                $_SESSION['UserId'] = $UserData['id'];
                //ACTUALIZAMOS LA FECHA DEL ÚLTIMO LOGIN
                $InsertData     =     array(
                    'fl' => $fecha,
                );
                $update     =     $db->update('usuarios', $InsertData, array('id' => ($UserData['id'])));

                setcookie("msg", "bienvenido", time() + 1, "/");
                header("location: /?bienvenido");
            } else {
                setcookie("msg", "inv", time() + 1, "/");
                header("location: /acceder?inv");
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
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
                        <h4 style="font-weight: 800; color: #33b1e3;" class="ps-banner__title">Iniciar Sesión
                        </h4>

                        <div class="row justify-content-center ">
                            <div class="col-sm-12 col-md-3">


                                <form method="POST" action="/acceder/">
                                    <div class="ps-form--contact">
                                        <div class="row justify-content-center ">
                                            <div class="col-12">
                                                <div class="ps-form__group">
                                                    <input class="form-control ps-form__input" type="email" name="email" placeholder="Correo de usuario" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="ps-form__group">
                                                    <input class="form-control ps-form__input" type="password" name="password" placeholder="Contraseña" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button class="w-100 ps-btn ps-btn--warning" type="submit" value="submit" name="submit">Acceder</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>

                        <p style="font-size: 18px; font-weight: 800; color: #f18500;">¿No tienes una cuenta? <a style="font-size: 18px; font-weight: 800; color: #33b1e3;" href="/registro">Registrate!</a></p>
                    </div>
                </div>



            </div>
        </section>

        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/agendar.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/footer.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/js.php"); ?>


</body>



</html>