<?php session_start();
    require_once($_SERVER["DOCUMENT_ROOT"]."/Optimania/include/sesion.php");

    if (($UserData['rol'])>2) {
        setcookie("msg","sad",time() + 1, "/");
        header('Location: /');
    }


    //OBTENER RANGO POR ID
    $rol = $db->getAllRecords('roles','*',' AND id="'.($UserData['rol']).'"LIMIT 1 ');
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
  <link rel="stylesheet" href="/Optimania/admin/assets/css/app.min.css">
  <link rel="stylesheet" href="/Optimania/admin/assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="/Optimania/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/Optimania/admin/assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="/Optimania/admin/assets/css/style.css">
  <link rel="stylesheet" href="/Optimania/admin/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="/Optimania/admin/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='/Optimania/admin/assets/img/favicon.ico' />
  
      
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        
      
        <?php
        require_once($_SERVER["DOCUMENT_ROOT"]."/Optimania/admin/modulos/navUser.php");
        require_once($_SERVER["DOCUMENT_ROOT"]."/Optimania/admin/modulos/menu-principal.php");
                
        if(isset($_COOKIE['msg'])) {
            require_once($_SERVER["DOCUMENT_ROOT"]."/Optimania/modulos/msg.php");
            } ?>
     
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
         
        <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
                <a href="/Optimania/admin"><h4 class="page-title m-b-0">Panel de control</h4></a>
            </li>
            <li class="breadcrumb-item">
                <i data-feather="settings"></i>
            </li>
            <li class="breadcrumb-item active">Entradas del blog</li>
        </ul>
         
       
        
        <div class="row">
            <?php
            $blogData = $db->getAllRecords('blog','*',' ORDER BY id DESC');
            if (count($blogData)>0){
                $y	=	'';
                    foreach($blogData as $blog){
                        $y++;?>
                        <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                            <article class="article">
                                <div class="article-header">
                                    <div class="article-image" data-background="/Optimania/upload/blog/<?php echo (strftime("%Y/%m", strtotime(($blog['fr']))));?>/<?php echo ($blog['portada']) ?>.jpg"></div>
                                    <div class="article-title">
                                        <h2><a target="_blank" href="#"><?php echo ($blog['titulo']) ?></a></h2>
                                    </div>
                                </div>
                                <div class="article-details">
                                    <p><?php echo ($blog['resumen']) ?></p>
                                    <div class="article-cta">
                                       
                                        <a href="/Optimania/admin/editar/blog?editId=<?php echo $blog['id']; ?>" class="btn btn-primary">Editar</a>
                                        
                                        <a href="/Optimania/admin/borrar/blog?delId=<?php echo $blog['id']; ?>" onClick="return confirm('Estás seguro? Esto no se puede deshacer');" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></a>
                                        
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php
                    }
                } else { 
                ?>
                
            <div class="col-md-6 col-lg6">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <br>
                        <br>
                        <br>
                        <br>
                        <h5>No hay entradas del blog publicadas</h5>
                        <div class="article-cta">
                            <a href="/Optimania/admin/nuevo/blog" class="btn btn-primary">¡Publíca una ahora!</a>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
            
            <?php
            }
            ?>
            
            
        </div>
            
        </section>
        <?php require_once($_SERVER["DOCUMENT_ROOT"]."/Optimania/admin/modulos/settings.php"); ?>
      </div>
       
        <footer class="main-footer">
            <div class="footer-left">Copyright &copy; 2020 <div class="bullet"></div> Creado por <a target="_blank" href="http://bananagroup.mx">Banana Group</a></div>
            <div class="footer-right"></div>
        </footer>
        
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="/Optimania/admin/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="/Optimania/admin/assets/bundles/datatables/datatables.min.js"></script>
  <script src="/Optimania/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="/Optimania/admin/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="/Optimania/admin/assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="/Optimania/admin/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="/Optimania/admin/assets/js/custom.js"></script>
  <script src="/Optimania/admin/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  
  
    
</body>

</html>