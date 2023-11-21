<?php
require('conexion.php');

$id_usuario = $_GET['id'];


$sql = "DELETE FROM `usuariosficha` WHERE `id_usuarios` = $id_usuario";
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
    die("Error al eliminar el usuario: " . mysqli_error($conn));
}

header("Location: mostrarRegistros.php");
exit();
?>
