<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/sesion.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/funciones.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (($UserData['rol']) > 2) {
    setcookie("msg", "sad", time() + 2, "/");
    header('Location: /');
}

if (isset($_REQUEST['editId']) and $_REQUEST['editId'] != "") {
    $blog  =  $db->getAllRecords('blog', '*', ' AND id="' . $_REQUEST['editId'] . '"LIMIT 1');
}

if (empty($blog)) { //SI NO EXISTE ES QUE NO HAY UN ID DE VÁLIDO Y REDIRECCIONAMOS Y LANZAMOS ERROR
    setcookie("msg", "noprod", time() + 2, "/");
    header('location:/admin/blog/');
    exit;
}

$blog  =  $blog[0]; //PASAMOS LOS PRIMEROS 2 FILTROS Y SI TENEMOS UNA UNIDAD VÁLIDA SELECCIONADA 

//OBTENER RANGO POR ID
$rol = $db->getAllRecords('roles', 'nombre', ' AND id="' . ($UserData['rol']) . '"LIMIT 1 ')[0]['nombre'];

date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d H:i:s");

setlocale(LC_ALL, 'es_MX');
$mesr = strftime("%m");
$anor = strftime("%Y");

//VAMOS A LEER EL ARCHIVO TXT DONDE GUARDAMOS EL CUERPO DEL BLOG
$ruta = '../../upload/blog/' . (strftime("%Y/%m", strtotime(($blog['fr'])))) . '';
$miTXT = fopen('' . $ruta . '/' . $blog['portada'] . '.txt', "r") or die("Unable to open file!");
$cuerpoBlog = fread($miTXT,filesize('' . $ruta . '/' . $blog['portada'] . '.txt'));
fclose($miTXT);


if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    extract($_REQUEST);

    if (($titulo == "") or ($resumen == "") or ($cuerpo == "")) {
        setcookie("msg", "basic", time() + 2, "/");
        header('location:/admin/editar/blog/?editId=' . $_REQUEST['editId'] . '');
        exit;
    } else {

        $codigo = ($blog['portada']); //SI NO SE SUBE LA FOTO LE DAMOS EL VALOR EXISTENTE QUE YA ESTÁ EN NUESTRA BASE DE DATOS

        if (!empty($_FILES['thumb']['tmp_name'])) {


            $thumb = $_FILES['thumb']['tmp_name']; //DEFINIMOS LA VARIABLE THUMB YA SABEMOS QUE SI SE CARGÓ UNA FOTO

            if ($_FILES['thumb']['type'] !== 'image/jpeg') {
                setcookie("msg", "fnv", time() + 2, "/");
                header('location:/admin/editar/blog/?editId=' . $_REQUEST['editId'] . '');
                exit;
            }

            if (($_FILES['thumb']['size']) > 1000000) {
                setcookie("msg", "fnvz", time() + 2, "/");
                header('location:/admin/editar/blog/?editId=' . $_REQUEST['editId'] . '');
                exit;
            }


            $codigo = GeraHash(10); //LO USAMOS PARA EL NOMBRE DE LA FOTO

            //SI LA CARPETA NO EXISTE LA CREAMOS
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            //SUBIMOS LA FOTO EN LA CARPETA EXISTENTE O LA CREADA
            $archivo_subido = '' . $ruta . '/' . $codigo . '.jpg';
            move_uploaded_file($thumb, $archivo_subido);

            //A ESTE PUNTO SABEMOS QUE SI SUBIÓ UNA FOTO NUEVA, ENTONCES DEBEMOS BORRAR LA EXISTENTE
            if (isset($blog['portada'])) {
                $archivo = '../../upload/blog/' . (strftime("%Y", strtotime(($blog['fr'])))) . '/' . (strftime("%m", strtotime(($blog['fr'])))) . '/' . ($blog['portada']) . '.jpg';
                unlink($archivo); //BORRAMOS LA FOTO ANTIGUA SACANDO EL NOMBRE DE LA BASE DE DATOS
            }
        }

        
        $miTXT = fopen('' . $ruta . '/' . $codigo . '.txt', "w") or die("Unable to open file!");
        $txt = $cuerpo;
        $txt .= "\n";
        fwrite($miTXT, $txt);
        fclose($miTXT);


        if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
            extract($_REQUEST);
            $data    =    array(
                'usuario' => $UserData['id'],
                'titulo' => $titulo,
                'resumen' => $resumen,
                'portada' => $codigo,
                'fa' => $fecha,
            );
            $update    =    $db->update('blog', $data, array('id' => ($_REQUEST['editId'])));





            if ($update) {
                setcookie("msg", "produp", time() + 2, "/");
                header('location:/admin/blog/'); //Exito en el cmabio
                exit;
            } else {
                setcookie("msg", "ups", time() + 2, "/");
                header('location:/admin/blog/'); //sin cambios
                exit;
            }
        }
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Black Diamond - Editar - Unidad</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/admin/assets/css/app.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/admin/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/admin/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="/admin/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/admin/assets/css/style.css">
    <link rel="stylesheet" href="/admin/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/admin/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/admin/assets/img/favicon.ico' />

    <style>
        .responsive {
            width: 100%;
            height: auto;
        }
    </style>


</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>


            <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/admin/modulos/navUser.php"); ?>
            <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/admin/modulos/menu-principal.php"); ?>


            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <a href="/admin">
                                <h4 class="page-title m-b-0">Panel de control</h4>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <i data-feather="edit"></i>
                        </li>
                        <li class="breadcrumb-item active">Editar unidad</li>
                    </ul>

                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <?php
                            //MENSAJES DE ESTATUS
                            if (isset($_COOKIE["msg"])) {
                                require_once($_SERVER["DOCUMENT_ROOT"] . "/include/msg.php");
                            } ?>
                        </div>
                    </div>

                    <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
                        <div class="row">


                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Nueva entrada del Blog</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Título</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input name="titulo" type="text" value="<?php echo $blog['titulo'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Resumen</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input name="resumen" type="text" value="<?php echo $blog['resumen'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Imagen de portada actual</label>
                                            <div class="col-sm-12 col-md-4">
                                                <img class="responsive" src="/upload/blog/<?php echo (strftime("%Y/%m", strtotime(($blog['fr'])))); ?>/<?php echo ($blog['portada']) ?>.jpg" alt="">
                                                <div>
                                                    <label for="image-upload" id="image-label">Para reemplazar la portada actual sube una nueva foto</label>
                                                    <input type="file" name="thumb" id="image-upload" />
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cuerpo del blog</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea name="cuerpo" class="summernote"><?php echo $cuerpoBlog ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>



                </section>
                <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/admin/modulos/settings.php"); ?>
            </div>

            <footer class="main-footer">
                <div class="footer-left">Copyright &copy; 2020 <div class="bullet"></div> Creado por <a target="_blank" href="http://bananagroup.mx">Banana Group</a></div>
                <div class="footer-right"></div>
            </footer>

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="/admin/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="/admin/assets/bundles/summernote/summernote-bs4.js"></script>
    <script src="/admin/assets/bundles/cleave-js/dist/cleave.min.js"></script>
    <script src="/admin/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
    <script src="/admin/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="/admin/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/admin/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/admin/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="/admin/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="/admin/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/admin/assets/js/page/create-post.js"></script>
    <!-- Template JS File -->
    <script src="/admin/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="/admin/assets/js/custom.js"></script>

    <script>
        function closeAlert() {
            document.getElementById("alert").style.display = "none";
        }
    </script>


</body>

</html>