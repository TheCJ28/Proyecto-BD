<?php 
    require( 'database.php');

    $mensaje="";
    if(!empty($_POST['email'])   && !empty($_POST["password"])){
        $sql= "INSERT INTO users(email,password) VALUES(:email,:password)";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':email',$_POST['email']);
        $claveSifrada = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $stmt->bindParam(':password',$claveSifrada);


        if ($stmt->execute()){
            $mensaje="Usuario creado";
        }else{
            $mensaje="Usuario no creado";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Resgritro sesion</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="signup.php" method="post">
                    <h2>Registrarse</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="Correo" name="email" required>
                        <label for="">Correo</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Contraseña</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Confirmar Contraseña</label>
                    </div>
                    <button>Registrarse</button>
                    <div class="register">
                        <p>Si ya tienes cuenta realiza<a href="login.php"> Login</a></p>
                    </div>  
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>