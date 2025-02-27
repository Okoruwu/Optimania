<?php session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/sesion.php");

if (($UserData['rol']) > 2) {
    setcookie("msg", "sad", time() + 1, "/");
    header('Location: /');
}


//OBTENER RANGO POR ID
$rol = $db->getAllRecords('roles', '*', ' AND id="' . ($UserData['rol']) . '"LIMIT 1 ');
$rol = $rol[0];
$rol = ($rol['nombre']);


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
                                                    <th>Producto</th>
                                                    <th>Nombre</th>
                                                    <th>Fecha de registro</th>
                                                    <th>Precio Publico</th>
                                                    <th>Precio</th>
                                                    <th>Estado</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $prodData = $db->getAllRecords('productos', '*', ' ORDER BY id DESC');
                                                if (count($prodData) > 0) {
                                                    $y    =    '';
                                                    foreach ($prodData as $producto) {
                                                        $y++;

                                                ?>
                                                        <tr>
                                                            <td><?php echo $y ?></td>
                                                            <td>
                                                                <img style="width: 50px;" src="/upload/productos/<?php echo (strftime("%Y", strtotime(($producto['fr'])))); ?>/<?php echo (strftime("%m", strtotime(($producto['fr'])))); ?>/<?php echo ($producto['fPortada']) ?>.jpg" alt="">
                                                                
                                                            </td>
                                                            <td><?php echo $producto['nombre']; ?></td>
                                                            <td>$<?php echo ($producto['precioPub']) ?></td>
                                                            <td>$<?php echo ($producto['precio']) ?></td>
                                                            <td><?php echo (strftime("%d de %B del %G", strtotime($producto['fr']))); ?></td>
                                                            <td class="text-center">

                                                                <?php if ($producto['destacado'] == 1) { ?> <div class="badge badge-success badge-shadow">Destacado <?php } ?></div>

                                                            </td>
                                                            <td class="text-center">
                                                                <a href="/admin/editar/producto?editId=<?php echo $producto['id']; ?>" class="btn btn-primary">Editar</a>

                                                                <a href="/admin/editar/galeria?prodId=<?php echo $producto['id']; ?>" type="button" class="btn btn-primary btn-icon icon-left"><i class="fas fa-images"></i> Galería <span class="badge badge-transparent"><?php echo ($producto['fotCount']) ?></span></a>

                                                                <a href="/admin/borrar/producto?delId=<?php echo $producto['id']; ?>" onClick="return confirm('Estás seguro? Esto no se puede deshacer');" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></a>

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