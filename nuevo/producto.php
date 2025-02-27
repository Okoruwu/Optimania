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


//OBTENER RANGO POR ID
$rol = $db->getAllRecords('roles', '*', ' AND id="' . ($UserData['rol']) . '"LIMIT 1 ');
$rol = $rol[0];
$rol = ($rol['nombre']);

date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d H:i:s");

setlocale(LC_ALL, 'es_MX');
$mesr = strftime("%m");
$anor = strftime("%Y");

$numCarac = '';
$numTags = '';
$numColor = '';
$numMaterial = '';
$numTamano = '';

if (isset($_REQUEST['caracteristicas'])) {
    $numCarac = count($_REQUEST['caracteristicas']);
}

if (isset($_REQUEST['tags'])) {
    $numTags = count($_REQUEST['tags']);
}

if (isset($_REQUEST['carColor'])) {
    $numColor = count($_REQUEST['carColor']);
}

if (isset($_REQUEST['carMaterial'])) {
    $numMaterial = count($_REQUEST['carMaterial']);
}

if (isset($_REQUEST['carTamano'])) {
    $numTamano = count($_REQUEST['carTamano']);
}



if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {


    extract($_REQUEST);
    if (($nombre == "") & ($descripcion == "") & (($_FILES['thumb']['tmp_name']) == "")) {
        setcookie("msg", "basic", time() + 2, "/");
        header('location: ');
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
    } else if (($_FILES['thumb']['tmp_name']) == "") {
        setcookie("msg", "foto", time() + 2, "/");
        header('location: ');
        exit;
    } else {


        if (empty($_REQUEST['destacado'])) {
            $destacado = 0;
        }

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

            $ruta = '../../upload/productos/' . $anor . '/' . $mesr . '';


            //SI LA CARPETA NO EXISTE LA CREAMOS
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            //SUBIMOS LA FOTO EN LA CARPETA EXISTENTE O LA CREADA
            $archivo_subido = '' . $ruta . '/' . $codigo . '.jpg';
            move_uploaded_file($thumb, $archivo_subido);
        }


        $casasCount    =    $db->getQueryCount('productos', 'id');
        if ($casasCount[0]['total'] < 1000) {
            $data    =    array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'categoria' => $categoria,
                'precioPub' => $precioPub,
                'carMarca' => $carMarca,
                'carForma' => $carForma,
                'precioSinDesc' => $precioSinDesc,
                'caracCount' => $numCarac,
                'tagsCount' => $numTags,
                'fPortada' => $codigo,
                'fr' => $fecha,
                'SKU' => $SKU,
                'destacado' => $destacado,
                'status' => $status,
            );
            $insert    =    $db->insert('productos', $data);
            $lastId =   $pdo->lastInsertId(); //OBTENEMOS EL ID DEL TOUR INCERTADO AL MOMENTO

            //SI HAY CARACTERISTICAS EJECUTAMOS ESTE BUCLE SEGUN EL NUMERO DE SELECCIONADOS
            if (isset($_REQUEST['caracteristicas'])) {
                if (is_array($_REQUEST['caracteristicas'])) {

                    $selected = '';
                    $conteo = 0;
                    foreach ($_REQUEST['caracteristicas'] as $check) {

                        if ($conteo < $numCarac)

                            $data    =    array(
                                'producto' => $lastId, //INSERTAMOS SIEMPRE EL ÚLTIMO ID DEL TOURINCERTADO EN ESTA MISMA EJECUCIÓN
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
                                'producto' => $lastId, //INSERTAMOS SIEMPRE EL ÚLTIMO ID DEL TOURINCERTADO EN ESTA MISMA EJECUCIÓN
                                'tag' => $check,
                            );
                        $insert    =    $db->insert('tagsenproducto', $data);

                        $conteo++;
                    }
                }
            }
            


            
            //SI HAY TAGS EJECUTAMOS ESTE BUCLE SEGUN EL NUMERO DE SELECCIONADOS
            if (isset($_REQUEST['carColor'])) {
                if (is_array($_REQUEST['carColor'])) {

                    $selected = '';
                    $conteo = 0;
                    foreach ($_REQUEST['carColor'] as $check) {

                        if ($conteo < $numColor)

                            $data    =    array(
                                'producto' => $lastId, //INSERTAMOS SIEMPRE EL ÚLTIMO ID DEL TOURINCERTADO EN ESTA MISMA EJECUCIÓN
                                'color' => $check,
                            );
                        $insert    =    $db->insert('carColorEnProducto', $data);

                        $conteo++;
                    }
                }
            }

            //SI HAY TAGS EJECUTAMOS ESTE BUCLE SEGUN EL NUMERO DE SELECCIONADOS
            if (isset($_REQUEST['carMaterial'])) {
                if (is_array($_REQUEST['carMaterial'])) {

                    $selected = '';
                    $conteo = 0;
                    foreach ($_REQUEST['carMaterial'] as $check) {

                        if ($conteo < $numMaterial)

                            $data    =    array(
                                'producto' => $lastId, //INSERTAMOS SIEMPRE EL ÚLTIMO ID DEL TOURINCERTADO EN ESTA MISMA EJECUCIÓN
                                'material' => $check,
                            );
                        $insert    =    $db->insert('carMaterialEnProducto', $data);

                        $conteo++;
                    }
                }
            }

            //SI HAY TAGS EJECUTAMOS ESTE BUCLE SEGUN EL NUMERO DE SELECCIONADOS
            if (isset($_REQUEST['carTamano'])) {
                if (is_array($_REQUEST['carTamano'])) {

                    $selected = '';
                    $conteo = 0;
                    foreach ($_REQUEST['carTamano'] as $check) {

                        if ($conteo < $numTamano)

                            $data    =    array(
                                'producto' => $lastId, //INSERTAMOS SIEMPRE EL ÚLTIMO ID DEL TOURINCERTADO EN ESTA MISMA EJECUCIÓN
                                'tamano' => $check,
                            );
                        $insert    =    $db->insert('carTamanoEnProducto', $data);

                        $conteo++;
                    }
                }
            }





            if ($insert) {
                setcookie("msg", "prodok", time() + 2, "/");
                header('location:/admin/productos');
                exit;
            } else {
                setcookie("msg", "ups", time() + 2, "/");
                header('location:/'); //sin cambios
                exit;
            }
        } else {
            setcookie("msg", "prodlim", time() + 2, "/");
            header('location:/'); //limite
            exit;
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
    <link rel="stylesheet" href="/admin/assets/bundles/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="/admin/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/admin/assets/css/style.css">
    <link rel="stylesheet" href="/admin/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/admin/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/admin/assets/img/favicon.ico' />
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
                            <i data-feather="layers"></i>
                        </li>
                        <li class="breadcrumb-item active">Agregar nuevo producto</li>
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
                                    <h4>Redactar nuevo producto</h4>
                                </div>

                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Nombre*</label>
                                                    <input name="nombre" class="form-control" type="text" required>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Categoria*</label>
                                                    <select name="categoria" class="form-control selectric" required>
                                                        <option selected disabled>Selecciona una categoría</option>
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
                                                        <input type="checkbox" value="1" name="destacado" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Destacado</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-6">
                                                <div class="form-group">
                                                    <label>Descripción*</label>
                                                    <textarea required name="descripcion" class="summernote-simple"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label>Imagen de portada*</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div id="image-preview" class="image-preview">
                                                            <label for="image-upload" id="image-label">Cargar imágen</label>
                                                            <input required type="file" name="thumb" id="image-upload" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Precio al público*</label>
                                                    <input required name="precioPub" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Precio sin desc</label>
                                                    <input name="precioSinDesc" class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>SKU</label>
                                                    <input name="SKU" class="form-control" type="text">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="row">


                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="section-title mt-0">Selecciona el estado del producto</div>
                                                            <div class="selectgroup w-100">
                                                                <?php
                                                                $statusData = $db->getAllRecords('statusProductos', '*', ' ORDER BY id ASC');
                                                                if (count($statusData) > 0) {
                                                                    $y    =    '';
                                                                    foreach ($statusData as $status) {
                                                                        $y++; ?>
                                                                        <label class="selectgroup-item">
                                                                            <input type="radio" name="status" value="<?php echo ($status['id']); ?>" class="selectgroup-input-radio" <?php if (($status['id']) == 1) {
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
                                                            <div class="section-title mt-0">Selecciona marca</div>
                                                            <div class="selectgroup w-100">
                                                                <?php
                                                                $statusData = $db->getAllRecords('carMarca', '*', ' ORDER BY id ASC');
                                                                if (count($statusData) > 0) {
                                                                    $y    =    '';
                                                                    foreach ($statusData as $status) {
                                                                        $y++; ?>
                                                                        <label class="selectgroup-item">
                                                                            <input type="radio" name="carMarca" value="<?php echo ($status['id']); ?>" class="selectgroup-input-radio" <?php if (($status['id']) == 1) {
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
                                                            <div class="section-title mt-0">Selecciona forma</div>
                                                            <div class="selectgroup w-100">
                                                                <?php
                                                                $statusData = $db->getAllRecords('carForma', '*', ' ORDER BY id ASC');
                                                                if (count($statusData) > 0) {
                                                                    $y    =    '';
                                                                    foreach ($statusData as $status) {
                                                                        $y++; ?>
                                                                        <label class="selectgroup-item">
                                                                            <input type="radio" name="carForma" value="<?php echo ($status['id']); ?>" class="selectgroup-input-radio" <?php if (($status['id']) == 1) {
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
                                                            <div class="section-title mt-0">Tags</div>
                                                            <div class="selectgroup selectgroup-pills">
                                                                <?php
                                                                $tagsData = $db->getAllRecords('tags', '*', ' ORDER BY nombre ASC');
                                                                if (count($tagsData) > 0) {
                                                                    $y    =    '';
                                                                    foreach ($tagsData as $tags) {
                                                                        $y++; ?>
                                                                        <label class="selectgroup-item">
                                                                            <input type="checkbox" name="tags[]" value="<?php echo ($tags['id']); ?>" class="selectgroup-input">
                                                                            <span class="selectgroup-button"><?php echo ($tags['nombre']); ?></span>
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
                                                            <div class="section-title mt-0">Características</div>
                                                            <div class="custom-control custom-checkbox">
                                                                <?php
                                                                $caracteristicaData = $db->getAllRecords('caracteristicas', '*', ' ORDER BY nombre ASC');
                                                                if (count($caracteristicaData) > 0) {
                                                                    $y    =    '';
                                                                    foreach ($caracteristicaData as $caracteristica) {
                                                                        $y++; ?>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input value="<?php echo ($caracteristica['id']); ?>" name="caracteristicas[]" type="checkbox" class="custom-control-input" id="car-<?php echo ($caracteristica['id']); ?>">
                                                                            <label class="custom-control-label" for="car-<?php echo ($caracteristica['id']); ?>"><?php echo ($caracteristica['nombre']); ?></label>
                                                                        </div>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="section-title mt-0">Selecciona colores</div>
                                                            <div class="custom-control custom-checkbox">
                                                                <?php
                                                                $caracteristicaData = $db->getAllRecords('carColor', '*', ' ORDER BY nombre ASC');
                                                                if (count($caracteristicaData) > 0) {
                                                                    $y    =    '';
                                                                    foreach ($caracteristicaData as $caracteristica) {
                                                                        $y++; ?>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input value="<?php echo ($caracteristica['id']); ?>" name="carColor[]" type="checkbox" class="custom-control-input" id="col-<?php echo ($caracteristica['id']); ?>">
                                                                            <label class="custom-control-label" for="col-<?php echo ($caracteristica['id']); ?>"><?php echo ($caracteristica['nombre']); ?> <span style="background: <?php echo ($caracteristica['exadecimal']); ?>;" class="selectgroup-button"> </span></label>
                                                                        </div>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="section-title mt-0">Material</div>
                                                            <div class="custom-control custom-checkbox">
                                                                <?php
                                                                $caracteristicaData = $db->getAllRecords('carMaterial', '*', ' ORDER BY nombre ASC');
                                                                if (count($caracteristicaData) > 0) {
                                                                    $y    =    '';
                                                                    foreach ($caracteristicaData as $caracteristica) {
                                                                        $y++; ?>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input value="<?php echo ($caracteristica['id']); ?>" name="carMaterial[]" type="checkbox" class="custom-control-input" id="mat-<?php echo ($caracteristica['id']); ?>">
                                                                            <label class="custom-control-label" for="mat-<?php echo ($caracteristica['id']); ?>"><?php echo ($caracteristica['nombre']); ?></label>
                                                                        </div>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="section-title mt-0">Tamaño</div>
                                                            <div class="custom-control custom-checkbox">
                                                                <?php
                                                                $caracteristicaData = $db->getAllRecords('carTamano', '*', ' ORDER BY nombre ASC');
                                                                if (count($caracteristicaData) > 0) {
                                                                    $y    =    '';
                                                                    foreach ($caracteristicaData as $caracteristica) {
                                                                        $y++; ?>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input value="<?php echo ($caracteristica['id']); ?>" name="carTamano[]" type="checkbox" class="custom-control-input" id="tam-<?php echo ($caracteristica['id']); ?>">
                                                                            <label class="custom-control-label" for="tam-<?php echo ($caracteristica['id']); ?>"><?php echo ($caracteristica['nombre']); ?></label>
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


                                            <div class="col-md-12">
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
    <script src="/admin/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="/admin/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="/admin/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/admin/assets/js/page/create-post.js"></script>
    <!-- Template JS File -->
    <script src="/admin/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="/admin/assets/js/custom.js"></script>

</body>

</html>