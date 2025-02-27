<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesion.php");

if (($UserData['rol'])>2) {
    setcookie("msg","sad",time() + 2, "/");
    header('Location: /');
}


if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
    
    $caracSel = $db->getAllRecords('tagsenproducto','*',' AND id="'.($_REQUEST['delId']).'"','LIMIT 1');
    
    if (empty($caracSel)) { //SI NO EXISTE ES QUE NO HAY UN ID VALIDO Y REDIRECCIONAMOS Y LANZAMOS ERROR
        setcookie("msg","ups",time() + 2, "/");
        header('location:/admin/productos');
        exit;
}
    $caracSel = $caracSel[0];
    
    
	$db->delete('tagsenproducto',array('id'=>$_REQUEST['delId']));
    
    
    //RESTAMOS -1 A SU LAS CARACTERISTICAS DE ESTA PROPIEDAD
        $prodSel = $db->getAllRecords('productos','*',' AND id="'.($caracSel['producto']).'"','LIMIT 1');
        $prodSel = $prodSel[0];
    
        $SumTag = (($prodSel['tagsCount'])-1);
        
        $InsertData	=	array(
            'tagsCount'=> $SumTag,
        );
	       $update	=	$db->update('productos',$InsertData,array('id'=>($prodSel['id'])));
           setcookie("msg","tagdel",time() + 2, "/"); 
	       header('location: /admin/editar/producto/?editId='.($prodSel['id']).'');
	exit;
}
?>