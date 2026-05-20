<?php

$conexion = new mysqli(
    "localhost",
    "root",
    "",
    "proyecto_videojuegos"
);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];
$email = $_POST['email'];

$sql = "INSERT INTO usuarios(nombre, contrasena, email)
VALUES (?, ?, ?)";

$stmt = $conexion->prepare($sql);

$stmt->bind_param("sss", $nombre, $contrasena, $email);

if ($stmt->execute()) {
    echo "Usuario guardado correctamente";
} else {
    echo "Error al guardar";
}

$stmt->close();
$conexion->close();

?>