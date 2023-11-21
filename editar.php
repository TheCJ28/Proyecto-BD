<?php
require('conexion.php');

$id_usuario = $_GET['id'];

$sql = "SELECT * FROM `usuariosficha` WHERE `id_usuarios` = $id_usuario";
$resultado = mysqli_query($conn, $sql);
$usuario = mysqli_fetch_assoc($resultado);

if (!$usuario) {
    die("Usuario no encontrado.");
}

header("Location: mostrarRegistro.php");
exit();
?>
