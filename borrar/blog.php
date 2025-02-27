<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesion.php");

    if (($UserData['rol'])>2) {
        setcookie("msg","sad",time() + 2, "/");
        header('Location: /');
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    date_default_timezone_set('America/Mexico_City');   
    $fecha = date("Y-m-d H:i:s");
    
    if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
        
        $DelProd = $db->getAllRecords('blog','*','AND id='.($_REQUEST['delId']).'','LIMIT 1');
        if (empty($DelProd)) { 
            setcookie("msg","ups",time() + 2, "/");
            header('location:/admin/blog');
            exit;
        }
        $DelProd = $DelProd[0];
    
        
            
            if (isset($DelProd['portada'])){
                $archivo = '../../upload/blog/'.(strftime("%Y/%m", strtotime(($DelProd['fr'])))).'/'.($DelProd['portada']).'.jpg';
                unlink($archivo); //BORRAMOS LA FOTO ANTIGUA SACANDO EL NOMBRE DE LA BASE DE DATOS
            }
            
            $archivo = '../../upload/blog/'.(strftime("%Y/%m", strtotime(($DelProd['fr'])))).'/'.($DelProd['portada']).'.txt';
            unlink($archivo); 
            
            $db->delete('blog',array('id'=>$_REQUEST['delId']));
            
            setcookie("msg","blogdel",time() + 2, "/");
            header('location: /admin/blog');
            exit;
}
?>