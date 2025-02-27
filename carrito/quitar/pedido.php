<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/include/sesion.php");

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
    
    
    
    //PRIMERO VERIFICAMOS QUE TENGA UN PEDIDO ABIERTO
    $pedidoAbierto = $db->getAllRecords('pedidos','*','AND usuario='.($UserData['id']).' AND status=1','LIMIT 1');
    
    
        if (!($pedidoAbierto)) {
            setcookie("msg","noped",time() + 2, "/");
            header('location: /');
            exit();
        } else { 
        
            //SI TIENE PEDIDO ABIERTO
            $pedidoAbierto = $pedidoAbierto [0];
            
            //BUSCAMOS EL PRODUCTO QUE QUIERE ELIMINAR
            $prodEnPedido = $db->getAllRecords('productosenpedido','*','AND pedido='.($pedidoAbierto['id']).' AND id='.($_REQUEST['delId']).'','LIMIT 1');
            
            
                if ($prodEnPedido) {
                    
                    $prodEnPedido = $prodEnPedido[0];
                    
                        //SI LA CANTIDAD DEL MISMO ARTICULO ES 1 y ADEMAS EL PEDIDO SOLO TIENE 1 ARTICULO DIFERENTE ELIMINAMOS EL PEDIDO
                        if (($pedidoAbierto['productosCount'])==1){
                            
                            $db->delete('productosenpedido',array('id'=>$prodEnPedido['id']));
                            $db->delete('pedidos',array('id'=>$pedidoAbierto['id']));
                            setcookie("msg","cvac",time() + 2, "/");
                            header('location:/carrito');//exito
				            exit;
                                     
                        } else {
                            
                            //SI AUN HAY MAS ARTICULOS EN PEDIDO SOLO BORRAMOS EL PRODUCTO DEL PEDIDO
                            $db->delete('productosenpedido',array('id'=>$prodEnPedido['id']));
                            
                            //RESTAMOS 1 A LA CANTIDAD DE PRODUCTOS DE ESTE PEDIDO
                            $SumProd = (($pedidoAbierto['productosCount'])-1);
                             
                            $InsertData	=	array(
                                'productosCount'=> $SumProd,
                                );
	                           $update	=	$db->update('pedidos',$InsertData,array('id'=>($pedidoAbierto['id'])));
                            
                               
                                 if ($update) {
                                    setcookie("msg","elimpr",time() + 2, "/");
                                    header('location:/carrito');//exito
				                    exit;
                               } else {
                                    setcookie("msg","elimups",time() + 2, "/");
                                    header('location:/carrito');//error
				                    exit;
                               }
                        }
                
                } else {
                     setcookie("msg","sad",time() + 2, "/");
                     header('location:/carrito');//INTENTA BORRAR UNO QUE NO ES DE EL
				     exit;
                }
            }
    }
    ?>
    
    
    
    