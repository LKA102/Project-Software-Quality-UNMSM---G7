<?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location: /php-login');
    }
    require 'database.php';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            header("Location: /php-login");
        } else {
            $message = 'Lo sentimos, esas credenciales no coinciden';
        }
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
  
    <?php require 'partials/header.php' ?>

    <h1>Inicia Sesión</h1>
    <span>o <a href="registro.php">Registro</a></span>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Introduce tu correo electrónico">
      <input name="password" type="password" placeholder="Ingresa tu contraseña">
      <input type="submit" value="Entrar">
    </form>
  </body>
</html>