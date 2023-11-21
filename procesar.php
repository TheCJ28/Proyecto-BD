<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css" />
    <title>Registro de Usuarios</title>
</head>
<body>

<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_completo = $_POST["nombre_completo"];
    $correoelectronico = $_POST["correoelectronico"];
    $numerodetelefono = $_POST['numerodetelefono'];

    $nombredeusuario = $_POST['nombredeusuario'];
    $nombresdeequipos = $_POST['nombresdeequipos'];
    $identificadoresjuego = $_POST['identificadoresjuego'];

    $nombredeljuego = $_POST['nombredeljuego'];
    $plataforma = $_POST['plataforma'];
    $cuentadejuego = $_POST['cuentadejuego'];

    $sql = "INSERT INTO usuariosFicha
    (nombre_completo, correoelectronico, numerodetelefono, nombredeusuario, nombresdeequipos, identificadoresjuego, nombredeljuego, plataforma, cuentadejuego)
    VALUES
    ('$nombre_completo', '$correoelectronico', '$numerodetelefono', '$nombredeusuario', '$nombresdeequipos', '$identificadoresjuego', '$nombredeljuego', '$plataforma', '$cuentadejuego')";

    if (mysqli_query($conn, $sql)) {
        echo "<h1 class='bien'>Registro con éxito</h1>";

        // Mostrar la tabla con los datos
        echo "
        <table class='tablaRegistros'>
            <tr>
                <td>Nombre</td>
                <td>$nombre_completo</td>
            </tr>
            <tr>
                <td>Correo Electrónico</td>
                <td>$correoelectronico</td>
            </tr>
            <tr>
                <td>Número de Teléfono</td>
                <td>$numerodetelefono</td>
            </tr>

            <tr>
                <td>nombre de usuario</td>
                <td>$nombredeusuario</td>
            </tr>
            <tr>
                <td>nombres de equipos</td>
                <td>$correoelectronico</td>
            </tr>
            <tr>
                <td>identificadores juego</td>
                <td>$identificadoresjuego</td>
            </tr>

            <tr>
                <td>nombre del juego</td>
                <td>$nombredeljuego</td>
            </tr>
            <tr>
                <td>plataforma</td>
                <td>$plataforma</td>
            </tr>
            <tr>
                <td>cuentade juego</td>
                <td>$cuentadejuego</td>
            </tr>

        </table>
        ";
    } else {
        echo "Error con la consulta: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<div class="listBtn">            
    <a class="btn" href="index-inscricion.html">Nuevo</a>
</div>

</body>
</html>
