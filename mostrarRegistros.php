<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css" />
    <title>Registros</title>
</head>
<body>
    <h1 class="Titulo"> Registros </h1>
    <?php
        require('conexion.php');

        if (isset($_POST['eliminar_id'])) {
            $id_usuario = $_POST['eliminar_id'];


            $sql = "DELETE FROM `usuariosficha` WHERE `id_usuarios` = $id_usuario";
            $resultado = mysqli_query($conn, $sql);

            if (!$resultado) {
                echo "Error al eliminar el usuario: " . mysqli_error($conn);
            }
        }

        if (isset($_POST['editar_id'])) {
            $id_usuario = $_POST['editar_id'];

            header("Location: index-inscricion.html?id=$id_usuario");
            exit();
        }

        $sql = 'SELECT * FROM `usuariosficha`';

        $consulta = mysqli_query($conn,$sql);

        echo "<table class='tablaRegistros'>";
        echo "<tr>";
        echo "<th>nombre completo</th>";
        echo "<th>correo electronico</th>";
        echo "<th>numero de telefono</th>";
        echo "<th>nombre de usuario</th>";
        echo "<th>nombres de equipos</th>";
        echo "<th>identificadores juego</th>";
        echo "<th>nombre del juego</th>";
        echo "<th>plataforma</th>";
        echo "<th>cuenta de juego</th>";
        echo "<th>Acciones</th>";
        echo "</tr>";

        while ($registro = mysqli_fetch_assoc($consulta)) {
        echo "<tr>";
        echo "<td>{$registro['nombre_completo']}</td>";
        echo "<td>{$registro['correoelectronico']}</td>";
        echo "<td>{$registro['numerodetelefono']}</td>";
        echo "<td>{$registro['nombredeusuario']}</td>";
        echo "<td>{$registro['nombresdeequipos']}</td>";
        echo "<td>{$registro['identificadoresjuego']}</td>";
        echo "<td>{$registro['nombredeljuego']}</td>";
        echo "<td>{$registro['plataforma']}</td>";
        echo "<td>{$registro['cuentadejuego']}</td>";
        echo "<td>";
        echo "<form method='post' action='mostrarRegistros.php'>";
        echo "<input type='hidden' name='editar_id' value='{$registro['id_usuarios']}' />";
        echo "<input type='submit' class='btn' value='Editar' />";
        echo "</form>";
        echo "<form method='post' action='mostrarRegistros.php'>";
        echo "<input type='hidden' name='eliminar_id' value='{$registro['id_usuarios']}' />";
        echo "<input type='submit' class='btn' value='Eliminar' />";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
        <div class="listBtn">            
           <a class="btn" href="index-inscricion.html"> Nuevo</a>
        </div>

</body>
</html>