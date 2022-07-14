<?php
    require 'database.php';

    $message = '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = '¡Usuario creado satisfactoriamente!';
        } else {
            $message = 'Ha ocurrido un error creando su contraseña';
        }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style2.css">
  </head>
  <body>
    <div class="container">
        <div class="imagen-formulario container__sixty">
        <a href="/php-login"><img src="assets/img/Chapatureceta.png" alt="logo"></a>
        </div>

        <form class="formulario container__forty" action="registro.php" method="POST">
            <div class="texto-formulario">
                <h2>Regístrate</h2>
                <p><span>o <a href="login.php">Inicia Sesión</a></span></p>
                
                <?php if(!empty($message)): ?>
                <p> <?= $message ?></p>
                <?php endif; ?>   
            </div>
            <div class="input">
                <label >Correo electrónico</label>
                <input placeholder="Correo" type="text" name="email">
            </div>
            <div class="input">
                <label >Contraseña</label>
                <input placeholder="Contraseña" type="password" name="password" >
            </div>
            <div class="input">
                <label>Repetir Contraseña</label>
                <input placeholder="Repetir Contraseña" type="password">
            </div>

            <div class="Botones_Registro">
                <div class="input">
                    <input type="submit" value="Registrarse">
                </div>
            </div>
        </form>

    </div>
    
  </body>
</html>