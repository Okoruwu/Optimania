<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesion.php");

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
    
    
    //VERIFICAMOS QUE EL PRODUCTO EXISTE
    $selProd = $db->getAllRecords('productos','*','AND id='.($_REQUEST['delId']).'','LIMIT 1');


    //EL PRODUCTO NO EXISTE ERROR UPS
    if (!($selProd)) {
        setcookie("msg","ups",time() + 2, "/");
        header('location: /carrito');
        exit();
        
    }
    
    $selProd = $selProd [0];
    
    //AHORA VERIFICAMOS SI EL USUARIO TIENE UN PEDIDO ABIERTO
    $pedidoAbierto = $db->getAllRecords('pedidos','*','AND usuario='.($UserData['id']).' AND status=1','LIMIT 1');
    
    
        if (!($pedidoAbierto)) {
            setcookie("msg","noped",time() + 2, "/");
            header('location: /');
            exit();
        } else {
            
            
            //SIGNIFICA QUE SI TIENE PEDIDO ABIERTO
            $pedidoAbierto = $pedidoAbierto [0];
            
            
                $prodEnPedido = $db->getAllRecords('productosenpedido','*','AND pedido='.($pedidoAbierto['id']).' AND producto='.($selProd['id']).'','LIMIT 1');
            
                //EL PRODUCTO NO ESTA EN SU PEDIDO ERROR UPS
                if  ($prodEnPedido) {
                    
                    $prodEnPedido = $prodEnPedido[0];
                    
                        //SI LA CANTIDAD DEL MISMO ARTICULO ES 1 y ADEMAS EL PEDIDO SOLO TIENE 1 ARTICULO DIFERENTE ELIMINAMOS EL PEDIDO
                        if ((($prodEnPedido['cantidad'])==1)and($pedidoAbierto['productosCount'])==1){
                            
                            $db->delete('productosenpedido',array('id'=>$prodEnPedido['id']));
                            $db->delete('pedidos',array('id'=>$pedidoAbierto['id']));
                            header('location:/carrito?msg=cvac');//exito
				            exit;
                                     
                        } else {
                            //SI LA CANTIDAD DEL MISMO ARTICULO ES 1 ESTE PREODUCTO SE ELEIMINA DEL PEDIDO
                            if (($prodEnPedido['cantidad'])==1){
                                
                                $db->delete('productosenpedido',array('id'=>$prodEnPedido['id']));
        
                                //RESTAMOS -1 PRODUCTO A ESTE PEDIDO
                                $sumprod = (($pedidoAbierto['productosCount'])-1);
                                
                                $InsertData	=	array(
                                    'productosCount'=> $sumprod,
                                );
	                             $update	=	$db->update('pedidos',$InsertData,array('id'=>($pedidoAbierto['id'])));
                                
                                         if ($update) {
                                            setcookie("msg","elimpr",time() + 2, "/");
                                            header('location:/carrito');//exito
				                            exit;
                                            } else {
                                            setcookie("msg","elimups1",time() + 2, "/");
                                            header('location:/carrito');//error
				                            exit;
                                        }
                            }
                        }
                    
                    
                    //SUMAMOS 1 A LA CANTIDAD DE PRODUCTOS DE ESTE PEDIDO
                    $SumProd = (($prodEnPedido['cantidad'])-1);
                     
                    $InsertData	=	array(
                        'cantidad'=> $SumProd,
                        );
	                    $update	=	$db->update('productosenpedido',$InsertData,array('id'=>($prodEnPedido['id'])));
                    
                       
                         if ($update) {
                            setcookie("msg","elimpr",time() + 2, "/");
                            header('location:/carrito');//exito
				            exit;
                       } else {
                            setcookie("msg","elimups",time() + 2, "/");
                            header('location:/carrito');//error
				            exit;
                       }
                
                } else { 
                    setcookie("msg","sad",time() + 2, "/");
                    header('location:/carrito'); //exito
                    exit;}
            
        } 
} 
?>