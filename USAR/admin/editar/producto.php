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
    $producto  =  $db->getAllRecords('productos', '*', ' AND id="' . $_REQUEST['editId'] . '"LIMIT 1');
}

if (empty($producto)) { //SI NO EXISTE ES QUE NO HAY UN ID DE VÁLIDO Y REDIRECCIONAMOS Y LANZAMOS ERROR
    setcookie("msg", "noprod", time() + 2, "/");
    header('location:/admin/productos');
    exit;
}

$producto  =  $producto[0]; //PASAMOS LOS PRIMEROS 2 FILTROS Y SI TENEMOS UNA PROPIEDAD VÁLIDA SELECCIONADA 

//OBTENER RANGO POR ID
$rol = $db->getAllRecords('roles', '*', ' AND id="' . ($UserData['rol']) . '"LIMIT 1 ');
$rol = $rol[0];
$rol = ($rol['nombre']);

date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d H:i:s");

setlocale(LC_ALL, 'es_MX');
$mesr = strftime("%m");
$anor = strftime("%Y");



$numCarac = 0;
$numTags = 0;

if (isset($_REQUEST['caracteristicas'])) {
    $numCarac = count($_REQUEST['caracteristicas']);
}

if (isset($_REQUEST['tags'])) {
    $numTags = count($_REQUEST['tags']);
}



if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    extract($_REQUEST);
    if (($nombre == "") & ($descripcion == "") & (($_FILES['thumb']['tmp_name']) == "")) {
        setcookie("msg", "basic", time() + 2, "/");
        header('location:?editId=' . $producto['id'] . '');
        exit;
    } else
    if ($nombre == "") {
        setcookie("msg", "basic", time() + 2, "/");
        header('location: ');
        exit;
    } else if ($descripcion == "") {
        setcookie("msg", "basic", time() + 2, "/");
        header('location: ');
        exit;
    } else {


        if (empty($_REQUEST['destacado'])) {
            $destacado = 0;
        }

        $codigo = ($producto['fPortada']); //SI NO SE SUBE LA FOTO LE DAMOS EL VALOR EXISTENTE QUE YA ESTÁ EN NUESTRA BASE DE DATOS

        if (!empty($_FILES['thumb']['tmp_name'])) {



            $thumb = $_FILES['thumb']['tmp_name']; //DEFINIMOS LA VARIABLE THUMB YA SABEMOS QUE SI SE CARGÓ UNA FOTO

            if ($_FILES['thumb']['type'] !== 'image/jpeg') {
                setcookie("msg", "fnv", time() + 2, "/");
                header('location: ');
                exit;
            }

            if (($_FILES['thumb']['size']) > 1000000) {
                setcookie("msg", "fnvz", time() + 2, "/");
                header('location: ');
                exit;
            }

            $codigo = GeraHash(10); //LO USAMOS PARA EL NOMBRE DE LA FOTO

            $ruta = '../../upload/productos/' . (strftime("%Y/%m", strtotime(($producto['fr'])))).'';


            //SI LA CARPETA NO EXISTE LA CREAMOS
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            //SUBIMOS LA FOTO EN LA CARPETA EXISTENTE O LA CREADA
            $archivo_subido = '' . $ruta . '/' . $codigo . '.jpg';
            move_uploaded_file($thumb, $archivo_subido);
        }

        //A ESTE PUNTO SABEMOS QUE SI SUBIÓ UNA FOTO NUEVA, ENTONCES DEBEMOS BORRAR LA EXISTENTE
        if (isset($producto['fPortada'])) {
            $archivo = '../../upload/productos/' . (strftime("%Y", strtotime(($producto['fr'])))) . '/' . (strftime("%m", strtotime(($producto['fr'])))) . '/' . ($producto['fPortada']) . '.jpg';
            unlink($archivo); //BORRAMOS LA FOTO ANTIGUA SACANDO EL NOMBRE DE LA BASE DE DATOS
        }


        if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
            extract($_REQUEST);
            $data    =    array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'fPortada' => $codigo,
                'categoria' => $categoria,
                'precioPub' => $precioPub,
                'precioSinDesc' => $precioSinDesc,
                'caracCount' => $numCarac,
                'caracCount' => (($producto['caracCount']) + ($numCarac)),
                'tagsCount' => (($producto['tagsCount']) + ($numTags)),
                'fa' => $fecha,
                'SKU' => $SKU,
                'destacado' => $destacado,
                'status' => $status,
            );
            $update    =    $db->update('productos', $data, array('id' => ($_REQUEST['editId'])));



            //SI HAY CARACTERISTICAS EJECUTAMOS ESTE BUCLE SEGUN EL NUMERO DE SELECCIONADOS
            if (isset($_REQUEST['caracteristicas'])) {
                if (is_array($_REQUEST['caracteristicas'])) {

                    $selected = '';
                    $conteo = 0;
                    foreach ($_REQUEST['caracteristicas'] as $check) {

                        if ($conteo < $numCarac)

                            $data    =    array(
                                'producto' => $producto['id'],
                                'caracteristica' => $check,
                            );
                        $insert    =    $db->insert('caracteristicasenproducto', $data);

                        $conteo++;
                    }
                }
            }



            //SI HAY TAGS EJECUTAMOS ESTE BUCLE SEGUN EL NUMERO DE SELECCIONADOS
            if (isset($_REQUEST['tags'])) {
                if (is_array($_REQUEST['tags'])) {

                    $selected = '';
                    $conteo = 0;
                    foreach ($_REQUEST['tags'] as $check) {

                        if ($conteo < $numTags)

                            $data    =    array(
                                'producto' => $producto['id'],
                                'tag' => $check,
                            );
                        $insert    =    $db->insert('tagsenproducto', $data);

                        $conteo++;
                    }
                }
            }





            if ($update) {
                setcookie("msg", "produp", time() + 2, "/");
                header('location:?editId=' . $_REQUEST['editId'] . ''); //Exito en el cmabio
                exit;
            } else {
                setcookie("msg", "ups", time() + 2, "/");
                header('location:?editId=' . $_REQUEST['editId'] . ''); //sin cambios
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
    <title>Optimania - Administrador</title>
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
                        <li class="breadcrumb-item active">Editar producto</li>
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



                    <div class="row">



                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Estás editando: <?php echo ($producto['nombre']) ?></h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Nombre*</label>
                                                    <input name="nombre" value="<?php echo ($producto['nombre']) ?>" class="form-control" type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Categoria*</label>
                                                    <select name="categoria" class="form-control selectric" required>
                                                        <option selected><?php echo ($producto['categoria']) ?></option>
                                                        <?php
                                                        $catData = $db->getAllRecords('categorias', '*', ' ORDER BY nombre ASC');
                                                        if (count($catData) > 0) {
                                                            $y    =    '';
                                                            foreach ($catData as $categoria) {
                                                                $y++; ?>
                                                                <option value="<?php echo ($categoria['id']); ?>"><?php echo ($categoria['nombre']); ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="custom-switch" style="margin-top: 35px;">
                                                        <input type="checkbox" value="1" name="destacado" class="custom-switch-input" <?php if (($producto['destacado']) == 1) {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Destacado</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-6">
                                                <div class="form-group">
                                                    <label>Descripción*</label>
                                                    <textarea required name="descripcion" class="summernote-simple"><?php echo ($producto['descripcion']) ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label>Imagen de portada actual</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <img class="responsive" src="/upload/productos/<?php echo (strftime("%Y", strtotime(($producto['fr'])))); ?>/<?php echo (strftime("%m", strtotime(($producto['fr'])))); ?>/<?php echo ($producto['fPortada']) ?>.jpg" alt="">
                                                        <div>
                                                            <label for="image-upload" id="image-label">Para reemplazar la portada actual sube una nueva foto</label>
                                                            <input type="file" name="thumb" id="image-upload" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Precio al público*</label>
                                                    <input required name="precioPub" class="form-control" type="text" value="<?php echo ($producto['precioPub']) ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Precio sin desc</label>
                                                    <input name="precioSinDesc" class="form-control" type="text" value="<?php echo ($producto['precioSinDesc']) ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>SKU</label>
                                                    <input name="SKU" class="form-control" type="text" value="<?php echo ($producto['SKU']) ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Selecciona el estado de publicación</label>
                                                    <div class="selectgroup w-100">
                                                        <?php
                                                        $statusData = $db->getAllRecords('statusProductos', '*', ' ORDER BY id ASC');
                                                        if (count($statusData) > 0) {
                                                            $y    =    '';
                                                            foreach ($statusData as $status) {
                                                                $y++; ?>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio" name="status" value="<?php echo ($status['id']); ?>" class="selectgroup-input-radio" <?php if (($producto['status']) == ($status['id'])) {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } ?>>
                                                                    <span class="selectgroup-button"><?php echo ($status['nombre']); ?></span>
                                                                </label>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="section-title mt-0">Características seleccionadas (<?php echo ($producto['caracCount']); ?>)</div>
                                                    <div class="custom-control custom-checkbox">
                                                        <ul>
                                                            <?php
                                                            $carSelData = $db->getAllRecords('caracteristicasenproducto', '*', ' AND producto="' . $_REQUEST['editId'] . '"', 'LIMIT ' . ($producto['caracCount']) . '');
                                                            if (count($carSelData) > 0) {
                                                                $y    =    '';
                                                                foreach ($carSelData as $carSel) {
                                                                    $y++;
                                                                    $carInd = $db->getAllRecords('caracteristicas', '*', ' AND id="' . ($carSel['caracteristica']) . '"', 'LIMIT 1');
                                                                    $carInd = $carInd[0];
                                                            ?>


                                                                    <li><?php echo ($carInd['nombre']); ?>
                                                                        <a href="/admin/borrar/prod-carac?delId=<?php echo ($carSel['id']); ?>"><i class="fa fa-remove"></i> Borrar</a>
                                                                    </li>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="section-title mt-0">Agregar más características (Opcional)</div>
                                                    <div class="custom-control custom-checkbox">
                                                        <?php $carData = $db->getAllRecords('caracteristicas', '*', 'ORDER BY nombre ASC');
                                                        if (count($carData) > 0) {
                                                            $y = '';
                                                            foreach ($carData as $carac) {
                                                                $y++;

                                                                //VERIFICAMOS LAS CARACTERISTICA QUE VAMOS A EXCLUIR
                                                                $caracExData = $db->getAllRecords('caracteristicasenproducto', '*', 'AND producto=' . $_REQUEST['editId'] . '', 'AND caracteristica=' . ($carac['id']) . '', 'LIMIT 1');

                                                                if (!($caracExData)) {
                                                        ?>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input value="<?php echo ($carac['id']); ?>" name="caracteristicas[]" type="checkbox" class="custom-control-input" id="check-col-<?php echo ($carac['id']); ?>">
                                                                        <label class="custom-control-label" for="check-col-<?php echo ($carac['id']); ?>"><?php echo ($carac['nombre']); ?></label>
                                                                    </div>

                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="section-title mt-0">Tags seleccionadas (<?php echo ($producto['tagsCount']); ?>)</div>
                                                    <div class="custom-control custom-checkbox">
                                                        <ul>
                                                            <?php
                                                            $tagSelData = $db->getAllRecords('tagsenproducto', '*', ' AND producto="' . $_REQUEST['editId'] . '"', 'LIMIT ' . ($producto['tagsCount']) . '');
                                                            if (count($tagSelData) > 0) {
                                                                $y = '';
                                                                foreach ($tagSelData as $tagSel) {
                                                                    $y++;
                                                                    $tagInd = $db->getAllRecords('tags', '*', ' AND id="' . ($tagSel['tag']) . '"', 'LIMIT 1');
                                                                    $tagInd = $tagInd[0];
                                                            ?>


                                                                    <li><?php echo ($tagInd['nombre']); ?>
                                                                        <a href="/admin/borrar/prod-tag?delId=<?php echo ($tagSel['id']); ?>"><i class="fa fa-remove"></i> Borrar</a>
                                                                    </li>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="section-title mt-0">Agregar más tags (Opcional)</div>
                                                    <div class="selectgroup selectgroup-pills">
                                                        <?php
                                                        $tagsData = $db->getAllRecords('tags', '*', ' ORDER BY nombre ASC');
                                                        if (count($tagsData) > 0) {
                                                            $y = '';
                                                            foreach ($tagsData as $tags) {
                                                                $y++;

                                                                //VERIFICAMOS LAS CARACTERISTICA QUE VAMOS A EXCLUIR
                                                                $tagExData = $db->getAllRecords('tagsenproducto', '*', 'AND producto=' . $_REQUEST['editId'] . '', 'AND tag=' . ($tags['id']) . '', 'LIMIT 1');

                                                                if (!($tagExData)) {
                                                        ?>
                                                                    <label class="selectgroup-item">
                                                                        <input type="checkbox" name="tags[]" value="<?php echo ($tags['id']); ?>" class="selectgroup-input">
                                                                        <span class="selectgroup-button"><?php echo ($tags['nombre']); ?></span>
                                                                    </label>
                                                        <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button class="btn btn-primary btn-lg" value="submit" name="submit" type="submit">Enviar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>

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