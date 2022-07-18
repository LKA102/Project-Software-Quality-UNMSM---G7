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
    <title>Principal</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style3.css">
</head>

<body>
    <header class="topheader">
        <nav class="topnav">
            <a href="/php-login/principal.php" class="chef">
                <img src="assets/img/cocineroGorro.png" alt="gorro de Chef" height="50" width="50" />
            </a>
            <ul class="menu">
                <li><a href="#Ayuda">Ayuda</a></li>
                <?php if (!empty($user)):?>
                <li><a href="./InsertarRecetas.php">Añadir receta</a></li>
                <li><a href="./logout.php">Cerrar Sesión</a></li>
                <?php else: ?>
                <li><a href="./login.php">Iniciar sesión</a></li>
                <li><a href="./registro.php">Regístrate</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <form method="POST">
        <div class="horizontal-padding vertical-padding">
            <section class="cuerpo">
                <div class="cuerpo-logo">
                    <a href="/php-login"> <img class="imagen-logo" src="assets/img/Chapatureceta.png"
                            alt="Logo Chapa tu receta"></a>
                </div>
                
                <div class="seleccionar-ingredientes">
                <input name="xnombre" class="opcion__filtro" type="text" placeholder="Buscar por nombre">
                <select name="tipo_r" id="" class="opcion_dos">
                    <option value="">Tipo</option>
                    <option value="Entrada">Entrada</option>
                    <option value="Segundo">Segundo</option>
                    <option value="Postre">Postre</option>
                </select>
                <select name="dificultad" id="" class="opcion_dos">
                    <option value="">Dificultad</option>
                    <option value="Fácil">Fácil</option>
                    <option value="Medio">Medio</option>
                    <option value="Difícil">Difícil</option>
                </select>
                <select name="tiempo" id="" class="opcion_dos">
                    <option value="">Tiempo</option>
                    <option value="5">5min</option>
                    <option value="15">15min</option>
                    <option value="30">30min</option>
                    <option value="45">45min</option>
                    <option value="60">60min</option>
                    <option value="75">75min</option>
                    <option value="90">90min</option>
                    <option value="105">105min</option>
                </select>

                    <button name="buscar" class="avanzado">Buscar</button>
                </div>


            </section>
        </div>

        <section class="contenedor">
        <button type="button" class="avanzado">Búsqueda Avanzada</button>
        <div class="avanzado__opciones">
            <select name="ordenar" id="" class="opcion_dos">
                <option value="none">Ordenar por</option>
                <option value="dificultad">Dificultad</option>
                <option value="tiempo_preparacion">Tiempo de preparación</option>
            </select>
            <select name="ordenar_asc&desc" id="" class="opcion_dos">
                <option value="none">Forma</option>
                <option value="ascendente">Ascendente</option>
                <option value="descendente">Descendente</option>
            </select>
            
        </div>
    </section> 
    <?php
    
    $filtro="";
    
    if(isset($_POST['buscar'])){
        
    if($_POST['xnombre'] == '' AND $_POST['tipo_r'] == '' AND $_POST['dificultad'] == '' AND $_POST['tiempo'] = '' ){$filtro='';}else{
        if($_POST['xnombre'] == '' AND $_POST['tipo_r'] == '' AND $_POST['dificultad'] == '' AND $_POST['tiempo'] != '' ){$filtro="WHERE tiempo = '".$_POST['tiempo']."'";}
        if($_POST['xnombre'] == '' AND $_POST['tipo_r'] == '' AND $_POST['dificultad'] != '' AND $_POST['tiempo'] == '' ){$filtro="WHERE dificultad = '".$_POST['dificultad']."'";}
        if($_POST['xnombre'] == '' AND $_POST['tipo_r'] == '' AND $_POST['dificultad'] != '' AND $_POST['tiempo'] != '' ){$filtro="WHERE dificultad = '".$_POST['dificultad']."' AND tiempo = '".$_POST['tiempo']."'";}
        if($_POST['xnombre'] == '' AND $_POST['tipo_r'] != '' AND $_POST['dificultad'] == '' AND $_POST['tiempo'] == '' ){$filtro="WHERE tipo_r = '".$_POST['tipo_r']."'";}
        if($_POST['xnombre'] == '' AND $_POST['tipo_r'] != '' AND $_POST['dificultad'] == '' AND $_POST['tiempo'] != '' ){$filtro="WHERE tipo_r = '".$_POST['tipo_r']."' AND tiempo = '".$_POST['tiempo']."'";}
        if($_POST['xnombre'] == '' AND $_POST['tipo_r'] != '' AND $_POST['dificultad'] != '' AND $_POST['tiempo'] == '' ){$filtro="WHERE tipo_r = '".$_POST['tipo_r']."' AND dificultad = '".$_POST['dificultad']."'";}
        if($_POST['xnombre'] == '' AND $_POST['tipo_r'] != '' AND $_POST['dificultad'] != '' AND $_POST['tiempo'] != '' ){$filtro="WHERE tipo_r = '".$_POST['tipo_r']."' AND dificultad = '".$_POST['dificultad']."' AND tiempo = '".$_POST['tiempo']."'";}
        if($_POST['xnombre'] != '' AND $_POST['tipo_r'] == '' AND $_POST['dificultad'] == '' AND $_POST['tiempo'] == '' ){$filtro="WHERE nombre like '".$_POST['xnombre']."%'";}
        if($_POST['xnombre'] != '' AND $_POST['tipo_r'] == '' AND $_POST['dificultad'] == '' AND $_POST['tiempo'] != '' ){$filtro="WHERE nombre like '".$_POST['xnombre']."%' AND tiempo = '".$_POST['tiempo']."'";}
        if($_POST['xnombre'] != '' AND $_POST['tipo_r'] == '' AND $_POST['dificultad'] != '' AND $_POST['tiempo'] == '' ){$filtro="WHERE nombre like '".$_POST['xnombre']."%' AND dificultad = '".$_POST['dificultad']."'";}
        if($_POST['xnombre'] != '' AND $_POST['tipo_r'] == '' AND $_POST['dificultad'] != '' AND $_POST['tiempo'] != '' ){$filtro="WHERE nombre like '".$_POST['xnombre']."%' AND dificultad = '".$_POST['dificultad']."' AND tiempo = '".$_POST['tiempo']."'";}
        if($_POST['xnombre'] != '' AND $_POST['tipo_r'] != '' AND $_POST['dificultad'] == '' AND $_POST['tiempo'] == '' ){$filtro="WHERE nombre like '".$_POST['xnombre']."%' AND tipo_r = '".$_POST['tipo_r']."'";}
        if($_POST['xnombre'] != '' AND $_POST['tipo_r'] != '' AND $_POST['dificultad'] == '' AND $_POST['tiempo'] != '' ){$filtro="WHERE nombre like '".$_POST['xnombre']."%' AND tipo_r = '".$_POST['tipo_r']."' AND tiempo = '".$_POST['tiempo']."'";}
        if($_POST['xnombre'] != '' AND $_POST['tipo_r'] != '' AND $_POST['dificultad'] != '' AND $_POST['tiempo'] == '' ){$filtro="WHERE nombre like '".$_POST['xnombre']."%' AND tipo_r = '".$_POST['tipo_r']."' AND dificultad = '".$_POST['dificultad']."'";}
        if($_POST['xnombre'] != '' AND $_POST['tipo_r'] != '' AND $_POST['dificultad'] != '' AND $_POST['tiempo'] != '' ){$filtro="WHERE nombre like '".$_POST['xnombre']."%' AND tipo_r = '".$_POST['tipo_r']."' AND dificultad = '".$_POST['dificultad']."' AND tiempo = '".$_POST['tiempo']."'";}
        
    }
    
    }
    $listRec=$conn->query("SELECT * FROM recetas $filtro ORDER BY id "); 

    
    ?>
    </form>
    <div class="main">
        <ul class="cards">

            <?php
                while($percard=$listRec->fetch(PDO::FETCH_ASSOC))
                {
                 echo'   
                <li class="cards_item">
                    <div class="card">
                        <div class="card_image"><img src="data:image/jpg;base64, '.base64_encode($percard['imagen']).'"></div>
                        <div class="card-info">
                            <h4 class="card_titlee">'.$percard['nombre'].'</h4>
                            <div class="descript">
                                <div class="desc">'.$percard['dificultad'].'</div>
                                <div class="desc">'.$percard['tiempo'].'min</div>
                            </div>
                            <input type="button" name="view" value="Ver Receta" id="'.$percard['id'].'"class="btn btn-info btn-xs view_data" />
                        </div>
                        
                    </div>
                    
                </li>';
                
                }
            ?>
        </ul>
    </div>
    <div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalles de la Receta</h4>
            </div>
            <div class="modal-body" id="employee_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>
</body>

</html>