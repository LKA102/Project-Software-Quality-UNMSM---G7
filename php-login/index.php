<?php
    session_start();

    require 'database.php';

    if (isset($_SESSION['user_id'])) {
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results) > 0) {
            $user = $results;
        }   
    } 
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ChapaTuReceta</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="container">
      <!-- Left content -->
      <div class="container__half">
        <div class="logo">
         <a href="/php-login"><img src="assets/img/Chapatureceta.png" alt="logo"></a>
        </div>
      </div>
      <!-- Right content -->
      <div class="container__half">
        <div class="botones">
        <a href="login.php" class="btn default-button">Iniciar Sesión</a> 
        <a href="registro.php" class="btn default-button">Regístrate</a>
        <a href="principal.php" class="underline">Iniciar sin cuenta</a>
        </div>
      </div>
    </div>
  <body>
<html>




    