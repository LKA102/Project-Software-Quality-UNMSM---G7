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

    $where="";
    $nombre = $_POST['xnombre'];    
    if(isset($_POST['buscar']))
    {
            $where="where nombre like '".$nombre."%'";
      
    }
    $listRec=$conn->query("SELECT * FROM recetas $where ORDER BY id ");

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
                    <div class="dropdown" data-control="checkbox-dropdown">
                        <label class="dropdown-label">Verduras</label>

                        <div class="dropdown-list">

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 1" />
                                Lechuga
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 2" />
                                Apio
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 3" />
                                Brocoli
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 4" />
                                Cebolla
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 5" />
                                Tomate
                            </label>
                        </div>
                    </div>
                    <div class="dropdown" data-control="checkbox-dropdown">
                        <label class="dropdown-label">Carnes</label>

                        <div class="dropdown-list">

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 1" />
                                Pollo
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 2" />
                                Pescado
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 3" />
                                Carne de res
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 4" />
                                Chuleta
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 5" />
                                Hígado
                            </label>
                        </div>
                    </div>
                    <div class="dropdown" data-control="checkbox-dropdown">
                        <label class="dropdown-label">Cereales</label>

                        <div class="dropdown-list">

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 1" />
                                Trigo
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 2" />
                                Avena
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 3" />
                                Arroz
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 4" />
                                Quinua
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 5" />
                                Maiz
                            </label>
                        </div>
                    </div>
                    <div class="dropdown" data-control="checkbox-dropdown">
                        <label class="dropdown-label">Especias</label>

                        <div class="dropdown-list">

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 1" />
                                Orégano
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 2" />
                                Pimienta
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 3" />
                                Comino
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 4" />
                                Ajonjoli
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 5" />
                                Romero
                            </label>
                        </div>
                    </div>
                    <div class="dropdown" data-control="checkbox-dropdown">
                        <label class="dropdown-label">Lácteos</label>

                        <div class="dropdown-list">

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 1" />
                                Leche
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 2" />
                                Queso
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 3" />
                                Mantequilla
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 4" />
                                Yogurt
                            </label>

                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="Selection 5" />
                                Queso crema
                            </label>
                        </div>
                    </div>
                    <button name="buscar" class="avanzado">Buscar</button>
                </div>


            </section>
        </div>
        <section class="contenedor">
            <button type="button" class="avanzado">Búsqueda Avanzada</button>
            <div class="avanzado__opciones">
                <input name="xnombre" class="opcion__filtro" type="text" placeholder="Buscar por nombre">
                <select name="ingredientes_no" id="" class="opcion_dos">
                    <option value="none">Ingredientes no deseados</option>
                    <option value="leche">Leche</option>
                    <option value="Kion">Kion</option>
                    <option value="beterraga">Beterraga</option>
                </select>
                <select name="ordenar" id="" class="opcion_dos">
                    <option value="none">Ordenar por</option>
                    <option value="precio">Precio</option>
                    <option value="facilidad">Facilidad</option>
                    <option value="economico">Económico</option>
                    <option value="alfabeto">alfabeto</option>
                </select>

            </div>
        </section>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>
</body>
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

</html>