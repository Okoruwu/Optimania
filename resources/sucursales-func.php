<?php

include_once '../DB/datab.php';

function agregarTienda($nombre, $distancia, $direccion, $referencia, $horario, $imagen, $mapa) {
    $conn = Database::getConnection();
    if (!$conn) {
        die("Error de conexión a la base de datos");
    }

    $stmt = $conn->prepare("INSERT INTO sucursales (nombre, distancia, direccion, referencia, horario, imagen, mapa) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("sdsssss", $nombre, $distancia, $direccion, $referencia, $horario, $imagen, $mapa);
    $result = $stmt->execute();

    return $result;
}

function eliminarTienda($id) {
    $conn = Database::getConnection();
    if (!$conn) {
        die("Error de conexión a la base de datos");
    }

    $stmt = $conn->prepare("DELETE FROM sucursales WHERE id = ?");
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    return $result;
}

function modificarTienda($id, $nombre, $distancia, $direccion, $referencia, $horario, $imagen, $mapa) {
    $conn = Database::getConnection();
    if (!$conn) {
        die("Error de conexión a la base de datos");
    }

    $stmt = $conn->prepare("UPDATE sucursales SET nombre = ?, distancia = ?, direccion = ?, referencia = ?, horario = ?, imagen = ?, mapa = ? WHERE id = ?");
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("sdsssssi", $nombre, $distancia, $direccion, $referencia, $horario, $imagen, $mapa, $id);
    $result = $stmt->execute();

    return $result;
}

function obtenerTiendas() {
    $conn = Database::getConnection();
    if (!$conn) {
        die("Error de conexión a la base de datos");
    }

    $query = "SELECT * FROM sucursales";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function obtenerTiendaPorId($id) {
    $conn = Database::getConnection();
    if (!$conn) {
        die("Error de conexión a la base de datos");
    }

    $stmt = $conn->prepare("SELECT * FROM sucursales WHERE id = ?");
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
?>