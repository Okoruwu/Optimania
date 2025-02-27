<?php session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/sesion.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/funciones.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (($UserData['rol']) > 2) {
    setcookie("msg", "sad", time() + 1, "/");
    header('Location: /admin');
}


//OBTENER RANGO POR ID
$rol = $db->getAllRecords('roles', '*', ' AND id="' . ($UserData['rol']) . '"LIMIT 1 ')[0]['nombre'];


if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    extract($_REQUEST);

    if (($_FILES['thumb']['tmp_name']) == "") {
        setcookie("msg", "foto", time() + 2, "/");
        header('location: /admin');
        exit;
    }


    date_default_timezone_set('America/Mexico_City');
    $fecha = date("Y-m-d H:i:s");

    setlocale(LC_ALL, 'es_MX');
    $mesr = strftime("%m");
    $anor = strftime("%Y");

    if (!empty($_FILES['thumb']['tmp_name'])) {

        $thumb = $_FILES['thumb']['tmp_name']; //DEFINIMOS LA VARIABLE THUMB YA SABEMOS QUE SI SE CARGÓ UNA FOTO

        if ($_FILES['thumb']['type'] !== 'image/jpeg') {
            setcookie("msg", "fnv", time() + 2, "/");
            header('location: /admin');
            exit;
        }

        if (($_FILES['thumb']['size']) > 1000000) {
            setcookie("msg", "fnvz", time() + 2, "/");
            header('location: /admin');
            exit;
        }

        $codigo = GeraHash(10); //LO USAMOS PARA EL NOMBRE DE LA FOTO

        $ruta = '../upload/promociones/' . $anor . '/' . $mesr . '';


        //SI LA CARPETA NO EXISTE LA CREAMOS
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
        }

        //SUBIMOS LA FOTO EN LA CARPETA EXISTENTE O LA CREADA
        $archivo_subido = '' . $ruta . '/' . $codigo . '.jpg';
        move_uploaded_file($thumb, $archivo_subido);


        $promCount    =    $db->getQueryCount('promociones', 'id');
        if ($promCount[0]['total'] < 1000) {
            $data    =    array(
                'foto' => $codigo,
                'fr' => $fecha,
                'usuario' => $UserData['id'],
            );
            $insert    =    $db->insert('promociones', $data);
            $lastId =   $pdo->lastInsertId(); //O
            if ($insert) {
                setcookie("msg", "prodok", time() + 2, "/");
                header('location:/admin/promociones');
                exit;
            } else {
                setcookie("msg", "ups", time() + 2, "/");
                header('location:/admin/promociones'); //sin cambios
                exit;
            }
        } else {
            setcookie("msg", "prodlim", time() + 2, "/");
            header('location:/admin/promociones'); //limite
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
    <link rel="stylesheet" href="/admin/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/jquery-selectric/selectric.css">
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
                            <i data-feather="settings"></i>
                        </li>
                        <li class="breadcrumb-item active">Productos publicados</li>
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

                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Todas las promociones</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label>Imagen para la promoción*</label>
                                                <div class="col-sm-12 col-md-7">
                                                    <div id="image-preview" class="image-preview">
                                                        <label for="image-upload" id="image-label">Cargar imágen</label>
                                                        <input required type="file" name="thumb" id="image-upload" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-lg" value="submit" name="submit" type="submit">Enviar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Todos los pedidos</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Promocion</th>
                                                    <th>Usuario</th>
                                                    <th>Publicado</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $prodData = $db->getAllRecords('promociones', '*', ' ORDER BY id DESC');
                                                if (count($prodData) > 0) {
                                                    $y    =    '';
                                                    foreach ($prodData as $promociones) {
                                                        $y++;
                                                        $userSel = $db->getAllRecords('usuarios', '*', 'AND id="'.$promociones['usuario'].'" LIMIT 1')[0];
                                                ?>
                                                        <tr>
                                                            <td><?php echo $y ?></td>
                                                            <td>
                                                                <img style="width: 50px;" src="/upload/promociones/<?php echo (strftime("%Y/%m", strtotime(($promociones['fr'])))); ?>/<?php echo ($promociones['foto']) ?>.jpg" alt="">

                                                            </td>
                                                            <td><?php echo $userSel['nombre']; ?></td>
                                                            <td class="text-center">
                                                            
                                                                <a href="/admin/borrar/promocion?delId=<?php echo $promociones['id']; ?>" onClick="return confirm('Estás seguro? Esto no se puede deshacer');" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></a>

                                                            </td>

                                                        </tr>

                                                <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
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
    <script src="/admin/assets/bundles/datatables/datatables.min.js"></script>
    <script src="/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/admin/assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="/admin/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="/admin/assets/js/custom.js"></script>
    <script src="/admin/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>




</body>

</html>