<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesion.php");

if (($UserData['rol'])>2) {
    setcookie("msg","sad",time() + 2, "/");
    header('Location: /');
}

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('tags',array('id'=>$_REQUEST['delId']));
    
    setcookie("msg","tagdel",time() + 2, "/");
	header('location: /admin/nuevo/categoria');
	exit;
}
?>