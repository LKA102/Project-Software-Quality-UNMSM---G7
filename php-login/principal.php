<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style3.css">
</head>

<body>
    <header class="topheader">
        <nav class="topnav">
            <a href="#" class="chef">
                <img src="assets/img/cocineroGorro.png" alt="gorro de Chef" height="50" width="50" />
            </a>
            <ul class="menu">
                <li><a href="#newReceta">Añadir receta</a></li>
                <li><a href="#Ayuda">Ayuda</a></li>
                <li><a href="#LogOut">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="horizontal-padding vertical-padding">
        <section class="cuerpo">
            <div class="cuerpo-logo">
                <img class="imagen-logo" src="assets/img/Chapatureceta.png" alt="Logo Chapa tu receta">
            </div>
            <div class="selection-ingredients">
                <ul class="ingredients">
                    <li>
                        <select name="ingredientes_verduras" id="" class="opcion">
                            <option value="none">Verduras</option>
                            <option value="Lechuga">Lechuga</option>
                            <option value="Apio">Apio</option>
                            <option value="Brocoli">Brocoli</option>
                            <option value="Vainita">Vainita</option>
                        </select>
                    </li>
                    <li>
                        <select name="ingredientes_carnes" id="" class="opcion">
                            <option value="none">Carnes</option>
                            <option value="Pollo">Pollo</option>
                            <option value="Pescado">Pescado</option>
                            <option value="Carne de res">Carne de res</option>
                            <option value="Chuleta">Chuleta</option>
                        </select>
                    </li>
                    <li>
                        <select name="ingredientes_cereales" id="" class="opcion">
                            <option value="none">Cereales</option>
                            <option value="Trigo">Trigo</option>
                            <option value="Avena">Avena</option>
                            <option value="Arroz">Arroz</option>
                            <option value="Quinua">Quinua</option>
                        </select>
                    </li>
                    <li>
                        <select name="ingredientes_especias" id="" class="opcion">
                            <option value="none">Especias</option>
                            <option value="Oregano">Oregano</option>
                            <option value="Pimienta">Pimienta</option>
                            <option value="Comino">Comino</option>
                            <option value="Ajonjoli">Ajonjoli</option>
                        </select>
                    </li>
                    <li>
                        <select name="ingredientes_lacteos" id="" class="opcion">
                            <option value="none">Lacteos</option>
                            <option value="Leche">Leche</option>
                            <option value="Queso">Queso</option>
                            <option value="Mantequilla">Mantequilla</option>
                            <option value="Yogur">Yogur</option>
                        </select>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <section class="contenedor">
        <button class="avanzado">Búsqueda Avanzada</button>
        <div class="avanzado__opciones">
            <input class="opcion__filtro" type="text" placeholder="Filtrar por nombre" >
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
    <div class="main">
        <ul class="cards">
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="assets/img/arrozconpollo.jpg"></div>
                    <div class="card-info">
                        <h2 class="card_title">Arroz con pollo</h2>
                    </div>
                </div>
            </li>
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="assets/img/arrozconpollo.jpg"></div>
                    <div class="card-info">
                        <h2 class="card_title">Arroz con pollo</h2>
                    </div>
                </div>
            </li>
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="assets/img/arrozconpollo.jpg"></div>
                    <div class="card-info">
                        <h2 class="card_title">Arroz con pollo</h2>
                    </div>
                </div>
            </li>
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="assets/img/arrozconpollo.jpg"></div>
                    <div class="card-info">
                        <h2 class="card_title">Arroz con pollo</h2>
                    </div>
                </div>
            </li>
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="assets/img/arrozconpollo.jpg"></div>
                    <div class="card-info">
                        <h2 class="card_title">Arroz con pollo</h2>
                    </div>
                </div>
            </li>
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="assets/img/arrozconpollo.jpg"></div>
                    <div class="card-info">
                        <h2 class="card_title">Arroz con pollo</h2>
                    </div>
                </div>
            </li>
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="assets/img/arrozconpollo.jpg"></div>
                    <div class="card-info">
                        <h2 class="card_title">Arroz con pollo</h2>
                    </div>
                </div>
            </li>
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="assets/img/arrozconpollo.jpg"></div>
                    <div class="card-info">
                        <h2 class="card_title">Arroz con pollo</h2>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- JavaScript acordeon-->
    <script>
        let elementosAcordeon = document.getElementsByClassName("avanzado");
        for (let i = 0; i < elementosAcordeon.length; i++) {
            elementosAcordeon[i].addEventListener("click", function () {
                this.classList.toggle("active");
                let panel = this.nextElementSibling;
                if (panel.style.display == "flex") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "flex";
                }
            });
        }
    </script>

    <body>

</html>