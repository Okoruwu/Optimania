<?php

include_once '../DB/datab.php';
function agregarProducto($nombre, $precio, $imagen, $detalles, $categoria) {

    $conn = Database::getConnection();

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO products (nombre, categoria, descripcion, price, imagen) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    $stmt->bind_param("sdsss", $nombre, $precio, $imagen, $detalles, $categoria);

    if ($stmt->execute()) {
        echo "Producto agregado correctamente.";
    } else {
        echo "Error al agregar el producto: " . $stmt->error;
    }
}

function eliminarProducto($id) {

    $conn = Database::getConnection();
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $stmt->error;
    }

}


function modificarProducto($id, $nombre, $precio, $imagen, $detalles, $categoria) {

    $conn = Database::getConnection();


    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE productos SET nombre = ?, precio = ?, imagen = ?, detalles = ?, categoria = ? WHERE id = ?");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }


    $stmt->bind_param("sdsssi", $nombre, $precio, $imagen, $detalles, $categoria, $id);

    if ($stmt->execute()) {
        echo "Producto modificado correctamente.";
    } else {
        echo "Error al modificar el producto: " . $stmt->error;
    }

}


function mostrarProducto($id) {

    $conn = Database::getConnection();

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM productos WHERE id = ?");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $id);


    $stmt->execute();
    $result = $stmt->get_result();

    $producto = null;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $producto = [
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'imagen' => $row['imagen'],
            'detalles' => explode(', ', $row['detalles']),
            'categoria' => $row['categoria']
        ];
    } else {
        echo "Producto no encontrado.";
    }
}


?>

