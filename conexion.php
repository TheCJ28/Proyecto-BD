<?php
$nombredeservidor = 'localhost';
$nombredeusuario = 'root';
$contrasena = '';
$basededatos = 'ficha_juego';

$conn = mysqli_connect($nombredeservidor, $nombredeusuario, $contrasena, $basededatos);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
} else {
    echo "Conexion hecha.";
}
?>
