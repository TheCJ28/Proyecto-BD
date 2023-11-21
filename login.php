<?php

    session_start ();

    require 'database.php';

    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header('Location: index2.html');
            exit();
        } else {
            $message = 'Lo siento, los datos no coinciden.';
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
    <title>Login in</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">

                <?php if(!empty($message)): ?>
                    <p> <? = $message ?></p>
                <?php endif; ?>

                <form action="login.php" method = "POST">
                    <h2>Iniciar Sesión</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">Correo</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Contraseña</label>
                    </div>
                    <button>Iniciar Sesión</button>
                    <div class="register">
                        <p>No tengo una cuenta<a href="signup.php"> Regístrate</a></p>
                    </div>  
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>