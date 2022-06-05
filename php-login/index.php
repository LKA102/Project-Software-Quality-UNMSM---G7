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

      <?php require 'partials/header.php' ?>

      <?php if(!empty($user)): ?>
        <br> Welcome. <?= $user['email']; ?>
        <br>You are Successfully Logged In
        <a href="logout.php">Logout</a>
        <?php else: ?>
            <h1>Iniciar Sesión o Registrase</h1>

            <a href="login.php">Iniciar Sesión</a> o
            <a href="registro.php">registro</a>
        <?php endif; ?>
  <body>
<html>




    