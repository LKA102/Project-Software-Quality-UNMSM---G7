<?php
    session_start();
    require 'database.php';
    if (!isset($_SESSION['user_id'])) {
        header('Location: /php-login/principal.php');
    }
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

<?php
    $datos = $conn -> query("SELECT * FROM ingredientes");
    $dato = $datos->fetchAll(PDO::FETCH_OBJ);
    //print_r($dato);
?>
<?php

if(isset($_POST['insertar']))
{
    $nombre=$_POST['nombre'];
    $creador=$_POST['creador'];
    $dificultad=$_POST['dificultad'];
    $tiempo=$_POST['tiempo'];
    $ingre1=$_POST['ingre1'];
    $ingre2=$_POST['ingre2'];
    $ingre3=$_POST['ingre3'];
    $ingre4=$_POST['ingre4'];
    $ingre5=$_POST['ingre5'];
    $ingre6=$_POST['ingre6'];
    $ingre7=$_POST['ingre7'];
    $ingre8=$_POST['ingre8'];
    $cargarimagen=($_FILES['imagen']['tmp_name']);
    $imagen=fopen($cargarimagen,'rb');
    $textpasos=$_POST['textpasos'];

    $insertarR=$conn->prepare("INSERT INTO recetas(nombre,creador,dificultad,tiempo,ingre1,ingre2,ingre3,ingre4,ingre5,ingre6,ingre7,ingre8,imagen,textpasos) VALUES (:nombre, :creador, :dificultad, :tiempo, :ingre1, :ingre2, :ingre3, :ingre4, :ingre5, :ingre6, :ingre7, :ingre8, :imagen, :textpasos)");
    $insertarR->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $insertarR->bindParam(':creador', $creador, PDO::PARAM_STR);
    $insertarR->bindParam(':dificultad', $dificultad, PDO::PARAM_STR);
    $insertarR->bindParam(':tiempo', $tiempo, PDO::PARAM_INT);
    $insertarR->bindParam(':ingre1', $ingre1, PDO::PARAM_STR);
    $insertarR->bindParam(':ingre2', $ingre2, PDO::PARAM_STR);
    $insertarR->bindParam(':ingre3', $ingre3, PDO::PARAM_STR);
    $insertarR->bindParam(':ingre4', $ingre4, PDO::PARAM_STR);
    $insertarR->bindParam(':ingre5', $ingre5, PDO::PARAM_STR);
    $insertarR->bindParam(':ingre6', $ingre6, PDO::PARAM_STR);
    $insertarR->bindParam(':ingre7', $ingre7, PDO::PARAM_STR);
    $insertarR->bindParam(':ingre8', $ingre8, PDO::PARAM_STR);
    $insertarR->bindParam(':imagen', $imagen, PDO::PARAM_LOB);
    $insertarR->bindParam(':textpasos', $textpasos, PDO::PARAM_STR);
    $insertarR->execute();
    $mensaje=' ';
    if($insertarR){
        $mensaje="<div class='bueno'>
        Registrado Correctamente!
        </div>";

    }
    else{
        $mensaje=" <div class='alerta'>
        Error! Rellene los espacios.
        </div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Agregar receta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="./assets/css/style6.css">

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
                <li><a href="./login.php">login</a></li>
                <li><a href="./registro.php">registrate</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    
    <?php if(!empty($mensaje)): ?>
    <p> <?= $mensaje ?></p>
    <?php endif; ?>
    <!-- multistep form -->
    <form id="msform" method="POST" enctype="multipart/form-data">
        <!-- progressbar -->
        <h2 class="titulo">
            Agregar Recetas
        </h2>
        <ul id="progressbar">
            <li class="active">Información general</li>
            <li>Receta</li>
            <li>Imagen</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Información general</h2>
            <h3 class="fs-subtitle">Ingresa los datos principales de la receta</h3>
            <label for="Nombre">
                Nombre del plato:
            </label>
            <input id="Nombre" name="nombre" type="text" placeholder="Escriba un Nombre" required /><br>
            <label for="creador">
                Creador:
            </label>
            <input id="creador" type="text" name="creador" value="<?= $user['email']; ?>" required />
            <br>
            <label for="dificultad">
                Nivel de dificultad
            </label>
            <select name="dificultad" required>
                <option value="facil">Fácil</option>
                <option value="medio">Medio</option>
                <option value="dificil">Difícil</option>
            </select>
            <br>
            <label for="tiempo">
                Tiempo de preparación
            </label>
            <select id="tiempo" name="tiempo" required>
                <option value="5" selected>5 min</option>
                <option value="15">15 min</option>
                <option value="30">30 min</option>
                <option value="45">45 min</option>
                <option value="60">60 min</option>
                <option value="75">75 min</option>
                <option value="90">90 min</option>
                <option value="105">105 min</option>
            </select>
            <input type="button" name="next" class="next action-button" value="Siguiente" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Receta</h2>
            <h3 class="fs-subtitle">Ingresa los ingredientes principales y la receta</h3>
            <div class="container-ingredientes">
                <select name="ingre1" required>
                    <option value="" selected>Seleccione ingrediente</option>
                    <?php foreach($dato as $dat){ ?>
                    <option value="<?php echo $dat->ingre;?>"><?php echo $dat->ingre;?></option>
                    <?php } ?>
                </select>
                <select name="ingre2">
                    <option value="" selected>Seleccione ingrediente</option>
                    <?php foreach($dato as $dat){ ?>
                    <option value="<?php echo $dat->ingre;?>"><?php echo $dat->ingre;?></option>
                    <?php } ?>
                </select>
                <select name="ingre3">
                    <option value="" selected>Seleccione ingrediente</option>
                    <?php foreach($dato as $dat){ ?>
                    <option value="<?php echo $dat->ingre;?>"><?php echo $dat->ingre;?></option>
                    <?php } ?>
                </select>
                <select name="ingre4">
                    <option value="" selected>Seleccione ingrediente</option>
                    <?php foreach($dato as $dat){ ?>
                    <option value="<?php echo $dat->ingre;?>"><?php echo $dat->ingre;?></option>
                    <?php } ?>
                </select>
                <select name="ingre5">
                    <option value="" selected>Seleccione ingrediente</option>
                    <?php foreach($dato as $dat){ ?>
                    <option value="<?php echo $dat->ingre;?>"><?php echo $dat->ingre;?></option>
                    <?php } ?>
                </select>
                <select name="ingre6">
                    <option value="" selected>Seleccione ingrediente</option>
                    <?php foreach($dato as $dat){ ?>
                    <option value="<?php echo $dat->ingre;?>"><?php echo $dat->ingre;?></option>
                    <?php } ?>
                </select>
                <select name="ingre7">
                    <option value="" selected>Seleccione ingrediente</option>
                    <?php foreach($dato as $dat){ ?>
                    <option value="<?php echo $dat->ingre;?>"><?php echo $dat->ingre;?></option>
                    <?php } ?>
                </select>
                <select name="ingre8">
                    <option value="" selected>Seleccione ingrediente</option>
                    <?php foreach($dato as $dat){ ?>
                    <option value="<?php echo $dat->ingre;?>"><?php echo $dat->ingre;?></option>
                    <?php } ?>
                </select>
            </div>
            </div>
            <label for="receta">
                Receta
            </label>
            <textarea name="textpasos" rows="10" cols="50" placeholder="Escribe aquí"></textarea>
            </div>
            <input type="button" name="previous" class="previous action-button" value="Anterior" />
            <input type="button" name="next" class="next action-button" value="Siguiente" />
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Imagen</h2>
            <h3 class="fs-subtitle">Inserte una imagen de la receta</h3>
            <div class="container-imagen">
                <div class="input-file-upload">
                    <div class="upload-btn">
                        <!-- <button class="btn">
                            Seleccione la imagen de su receta -->
                        Agregar imagen
                        <input type="file" name="imagen" id="upfile" onchange="readURL(this); "
                            value="Agregue una imagen" />
                        <!-- </button> -->
                    </div>
                    <img class="upload_img" id="file_upload">
                </div>
                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#file_upload')
                                    .attr('src', e.target.result);
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
            </div>
            <input type="button" name="previous" class="previous action-button" value="Anterior" />
            <input name="insertar" class="action-button" type="submit" value="Enviar" />
            
        </fieldset>
    </form>
    <!-- partial -->
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src="./assets/js/jsrecetas.js"></script>

</body>

</html>