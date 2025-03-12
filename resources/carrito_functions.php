<?php
session_start();

function agregarAlCarrito($producto)
{
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    $encontrado = array_search($producto['id'], array_column($_SESSION['carrito'], 'id'));
    if ($encontrado !== false) {
        $_SESSION['carrito'][$encontrado]['cantidad']++;
    } else {
        $producto['cantidad'] = 1;
        array_push($_SESSION['carrito'], $producto);
    }
}

function calcularTotal()
{
    return array_reduce($_SESSION['carrito'] ?? array(), function ($total, $item) {
        return $total + ($item['precio'] * $item['cantidad']);
    }, 0);
}

function cantidadProductos()
{
    return count($_SESSION['carrito'] ?? array());
}

if (isset($_POST['accion_carrito'])) {
    require_once 'carrito_functions.php';

    switch ($_POST['accion_carrito']) {
        case 'agregar':
            $producto = [
                'id' => $_POST['producto_id'],
                'nombre' => $_POST['producto_nombre'],
                'precio' => $_POST['producto_precio'],
                'imagen' => $_POST['producto_imagen']
            ];
            agregarAlCarrito($producto);
            break;
    }
    exit;
}
?>