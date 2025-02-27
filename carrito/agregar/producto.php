<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesionUser.php");

date_default_timezone_set('America/Mazatlan');   
$fecha = date("Y-m-d H:i:s");

//GENERAR CODIGO ALEATORIO
function GeraHash($qtd){ 
$Caracteres = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
$QuantidadeCaracteres = strlen($Caracteres); 
$QuantidadeCaracteres--; 

$Hash=NULL; 
    for($x=1;$x<=$qtd;$x++){ 
        $Posicao = rand(0,$QuantidadeCaracteres); 
        $Hash .= substr($Caracteres,$Posicao,1); 
    } 

return $Hash; 
}

function remove_url_query_args($url,$keys=array()) {
        $url_parts = parse_url($url);
        if(empty($url_parts['query'])) return $url;
                
        parse_str($url_parts['query'], $result_array);
        foreach ( $keys as $key ) { unset($result_array[$key]); }
        $url_parts['query'] = http_build_query($result_array);
        $url = (isset($url_parts["scheme"])?$url_parts["scheme"]."://":"").
                (isset($url_parts["user"])?$url_parts["user"].":":"").
                (isset($url_parts["pass"])?$url_parts["pass"]."@":"").
                (isset($url_parts["host"])?$url_parts["host"]:"").
                (isset($url_parts["port"])?":".$url_parts["port"]:"").
                (isset($url_parts["path"])?$url_parts["path"]:"").
                (isset($url_parts["query"])?"?".$url_parts["query"]:"").
                (isset($url_parts["fragment"])?"#".$url_parts["fragment"]:"");
        return $url; }
    
$keys = array("msg");
$url = $_SERVER['HTTP_REFERER'];
$url = remove_url_query_args($url,$keys);

// output: http://example.org/?param2=value2



if(isset($_REQUEST['addId']) and $_REQUEST['addId']!=""){
	extract($_REQUEST);
    
    if (empty($Qty)){
        $Qty=1;
    }
    
    
    
    //VERIFICAMOS QUE EL PRODUCTO EXISTE
    $addProd = $db->getAllRecords('productos','*','AND id='.($_REQUEST['addId']).'','LIMIT 1');


    //EL PRODUCTO NO EXISTE ERROR UPS
    if (!($addProd)) {
        setcookie("msg","ups",time() + 2, "/");
        header('location: '.$url.'');
        exit();
        
    }    
	//SI EXISTE, TOMAMOS TODA SU INFORMACIÓN
    $addProd = $addProd [0];
 
    //AHORA VERIFICAMOS SI EL USUARIO TIENE UN PEDIDO ABIERTO
     $pedidoAbierto = $db->getAllRecords('pedidos','*','AND usuario='.($UserData['id']).' AND status=1','LIMIT 1');
    
    
        if (!($pedidoAbierto)) {
            
            $codigo = GeraHash(15);
            
                //SIGNIFICA QUE NO HAY PEDIDO ABIERTO ASI QUE CREAMOS UN NUEVO PEDIDO ABIERTO
            
                $PedCount	=	$db->getQueryCount('pedidos','id');
                if($PedCount[0]['total']<500000){
			    $data	=	array(
			    				'usuario'=>($UserData['id']),
			    				'status'=>1,
			    				'productosCount'=>1, 
			    				'codigo'=>$codigo, 
			    				'fr'=>$fecha, 
			    			);
                            $insert	=	$db->insert('pedidos',$data);
                            $lastId =   $pdo->lastInsertId(); //OBTENEMOS EL ID DE EL PEDIDO ABIERTO EN ESTE MOMENTO
           
                            if($insert){
                                     
                                $prodPedCount	=	$db->getQueryCount('productosenpedido','id');
                                if($prodPedCount[0]['total']<500000){
                                    $data	=	array(
                                        'pedido'=>$lastId,
                                        'producto'=>($addProd['id']),
                                        'cantidad'=>$Qty, 
                                    );
                                    $insert2	=	$db->insert('productosenpedido',$data);
                                        
                                    if($insert2){
                                        setcookie("msg","agpr",time() + 2, "/");
                                        header('location: '.$url.'');//exito
		                        		exit; } 
                                    else {
		                        		setcookie("msg","ups",time() + 2, "/");
                                        header('location: '.$url.'');//sin cambios
		                        		exit; }
                                    
		                        } else {
		                        	setcookie("msg","dsd",time() + 2, "/");
                                    header('location: '.$url.'');//limite
		                        	exit; }
                     
                     
                     
			} else {
				setcookie("msg","ups",time() + 2, "/");
                header('location: '.$url.'');//sin cambios
				exit; }
		} else {
			setcookie("msg","dsd",time() + 2, "/");
            header('location: '.$url.'');//limite
			exit; } 
        
            
        
        } else {
            
            
            //SI HAY PEDIDO ABIERTO ASI QUE TOMAMOS LA INFORMACIÓN
            $pedidoAbierto = $pedidoAbierto [0];
            
            //VERIFICAMOS SI EL PRODUCTO EXISTE YA EN NUESTRO PEDIDO ABIERTO
            $prodEx = $db->getAllRecords('productosenpedido','*','AND pedido='.($pedidoAbierto['id']).' AND producto='.($addProd['id']).'','LIMIT 1');
            
                if  (!empty($prodEx)) {
                    
                    $prodEx = $prodEx [0];
                    
                    //SUMAMOS 1 A LA CANTIDAD DE PRODUCTOS DE ESTE PEDIDO
                    $SumProd = (($prodEx['cantidad'])+$Qty);
                     
                    $InsertData	=	array(
                        'cantidad'=> $SumProd,
                        );
	                    $update	=	$db->update('productosenpedido',$InsertData,array('id'=>($prodEx['id'])));
                    
                       
                         if ($update) {
                            setcookie("msg","agpr",time() + 2, "/");
                            header('location: '.$url.'');//exito
				            exit;
                       } else {
                            setcookie("msg","agprups",time() + 2, "/");
                            header('location: '.$url.'');
				            exit;
                       }
                
                } else {
            
            $prodPedCount  = $db->getQueryCount('productosenpedido','id');
		      if($prodPedCount[0]['total']<500000){
			     $data	=	array(
			     				'pedido'=>($pedidoAbierto['id']),
			     				'producto'=>($addProd['id']),
			     				'cantidad'=>$Qty, 
			     			);
			     $insert	=	$db->insert('productosenpedido',$data);
            
			     if($insert){
                        
                     //SUMAMOS 1 A LA CANTIDAD DE PRODUCTOS DE ESTE PEDIDO
                     $SumProd = (($pedidoAbierto['productosCount'])+1);
                     
                     $InsertData	=	array(
                         'productosCount'=> $SumProd,
                     );
	                   $update	=	$db->update('pedidos',$InsertData,array('id'=>($pedidoAbierto['id'])));
                
                                
				setcookie("msg","carok",time() + 2, "/");
                header('location: '.$url.'');//exito
				exit;
			} else {
                setcookie("msg","ups",time() + 2, "/");
				header('location:'.$url.'');//sin cambios
				exit; }
		} else{
            setcookie("msg","dsd",time() + 2, "/");
			header('location:'.$url.''); //limite
			exit; }
            
     }
    }//CIERRA PEDIDO ABIERTO
	
} 
setcookie("msg","noprod",time() + 2, "/");
header('location:'.$url.''); //limite
exit; 

?>
		