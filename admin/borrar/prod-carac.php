<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesion.php");

if (($UserData['rol'])>2) {
    setcookie("msg","sad",time() + 2, "/");
    header('Location: /');
}


if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
    
    $caracSel = $db->getAllRecords('caracteristicasenproducto','*',' AND id="'.($_REQUEST['delId']).'"','LIMIT 1');
    
    if (empty($caracSel)) { //SI NO EXISTE ES QUE NO HAY UN ID VALIDO Y REDIRECCIONAMOS Y LANZAMOS ERROR
        setcookie("msg","ups",time() + 2, "/");
        header('location:/admin/productos');
        exit;
}
    $caracSel = $caracSel[0];
    
    
	$db->delete('caracteristicasenproducto',array('id'=>$_REQUEST['delId']));
    
    
    //RESTAMOS -1 A SU LAS CARACTERISTICAS DE ESTA PROPIEDAD
        $prodSel = $db->getAllRecords('productos','*',' AND id="'.($caracSel['producto']).'"','LIMIT 1');
        $prodSel = $prodSel[0];
    
        $SumCar = (($prodSel['caracCount'])-1);
        
        $InsertData	=	array(
            'caracCount'=> $SumCar,
        );
	       $update	=	$db->update('productos',$InsertData,array('id'=>($prodSel['id'])));
           setcookie("msg","cardel",time() + 2, "/"); 
	       header('location: /admin/editar/producto/?editId='.($prodSel['id']).'');
	exit;
}
?>