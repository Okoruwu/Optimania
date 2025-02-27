<?php session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/funciones.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
            if(isset($_COOKIE["msg"])) {
            require_once($_SERVER["DOCUMENT_ROOT"]."/include/msg.php");
            } ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/header.php"); ?>


        <section class="mt-50">
            <div class="container mt-50">
                <div class="row mt-50">
                    <div class="ps-home__content">
                        <div class="container">
                            <div class="ps-promo ps-not-padding">
                                <div class="row">

                                    <?php
                                    $blogData = $db->getAllRecords('blog', '*', ' ORDER BY id DESC');
                                    if (count($blogData) > 0) {
                                        $y    =    '';
                                        foreach ($blogData as $blog) {
                                            $y++; ?>
                                            <div class="col-12 col-md-4 mt-10">
                                                <img src="/upload/blog/<?php echo (strftime("%Y/%m", strtotime(($blog['fr'])))); ?>/<?php echo ($blog['portada']) ?>.jpg" alt="">
                                                <div class="article-title">
                                                    <h2 style="text-align: center; background: #33b1e3; color: #fff;"><a target="_blank" href="#"><?php echo ($blog['titulo']) ?></a></h2>
                                                    <h3 style="text-align: center;background: #ccc;color: #fff;padding-top: 5px;margin-top: -10px;height: 62px;"><a style="padding: 3px;background: #f18500;display: block;width: 73px;margin: 7px auto;border-radius: 36px;" target="_blank" href="#">Ver</a></h3>
                                                </div>
                                            </div>


                                    <?php
                                        }
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>


        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/footer.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/js.php"); ?>


</body>



</html>