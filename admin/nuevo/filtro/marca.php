<?php session_start();
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


if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    extract($_REQUEST);
    if ($nombre == "") {
        setcookie("msg", "all", time() + 2, "/");
        header('location:/admin/nuevo/filtro/marca');
        exit;
    } else {


        if (($_FILES['thumb']['tmp_name']) == "") {
            setcookie("msg", "foto", time() + 2, "/");
            header('location:/admin/nuevo/filtro/marca');
            exit;
        }



        if (!empty($_FILES['thumb']['tmp_name'])) {

            $thumb = $_FILES['thumb']['tmp_name']; //DEFINIMOS LA VARIABLE THUMB YA SABEMOS QUE SI SE CARGÓ UNA FOTO

            if ($_FILES['thumb']['type'] !== 'image/png') {
                setcookie("msg", "fnv", time() + 2, "/");
                header('location:/admin/nuevo/filtro/marca');
                exit;
            }

            if (($_FILES['thumb']['size']) > 1000000) {
                setcookie("msg", "fnvz", time() + 2, "/");
                header('location:/admin/nuevo/filtro/marca');
                exit;
            }

            $codigo = GeraHash(10); //LO USAMOS PARA EL NOMBRE DE LA FOTO

            $ruta = '../../../upload/filtros/marcas';


            //SI LA CARPETA NO EXISTE LA CREAMOS
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            //SUBIMOS LA FOTO EN LA CARPETA EXISTENTE O LA CREADA
            $archivo_subido = '' . $ruta . '/' . $codigo . '.png';
            move_uploaded_file($thumb, $archivo_subido);


            $caractCount    =    $db->getQueryCount('carMarca', 'id');
            if ($caractCount[0]['total'] < 10000) {
                $data    =    array(
                    'nombre' => ($nombre),
                    'foto' => ($codigo),
                );
                
                $insert    =    $db->insert('carMarca', $data);
                if ($insert) {
                    setcookie("msg", "catok", time() + 2, "/");
                    header('location:/admin/nuevo/filtro/marca'); //exito
                    exit;
                } else {
                    setcookie("msg", "ups", time() + 2, "/");
                    header('location:/admin/nuevo/filtro/marca'); //sin cambios
                    exit;
                }
            } else {
                setcookie("msg", "lim", time() + 2, "/");
                header('location:/admin/nuevo/filtro/marca'); //limite
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
    <title>Optimania - Filtros</title>
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
                            <i data-feather="check-circle"></i>
                        </li>
                        <li class="breadcrumb-item active">Agregar una nueva marca</li>
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
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <form method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Agregar una marca nueva</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input name="nombre" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label>Logotipo de marca*</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div id="image-preview" class="image-preview">
                                                            <label for="image-upload" id="image-label">Cargar imágen</label>
                                                            <input required type="file" name="thumb" id="image-upload" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Enviar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Todas las marcas</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th></th>
                                                    <th>Nombre</th>
                                                    <th class="text-rigth">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $categoriaData = $db->getAllRecords('carMarca', '*', 'ORDER BY id DESC');
                                                if (count($categoriaData) > 0) {
                                                    $y    =    '';
                                                    foreach ($categoriaData as $categoria) {
                                                        $y++;
                                                ?>
                                                        <tr>
                                                            <td><?php echo $y ?></td>
                                                            <td>
                                                                <img style="width: 50px;" src="/upload/filtros/marcas/<?php echo ($categoria['foto']) ?>.png" alt="">

                                                            </td>
                                                            <td><?php echo $categoria['nombre']; ?></td>
                                                            <td class="text-rigth">
                                                                <a href="/admin/editar/carMarca?editId=<?php echo $categoria['id']; ?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                                                <a href="/admin/borrar/carMarca?delId=<?php echo $categoria['id']; ?>" onClick="return confirm('Estás seguro? Esto no se puede deshacer');" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></a>
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