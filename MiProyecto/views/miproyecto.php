<?php
session_start();
include("../controller/conexion.php");
if (!isset($_SESSION['username'])) {
    header("Location:../model/login.php");
    exit();
}

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página de Gatos</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* ... (estilos anteriores) ... */
        .detail-container {
            display: none;
            margin-top: 10px;
            text-align: center;
        }

        .favorite-button {
            margin-top: 10px;
        }
        #user {
        display: flex;
        gap: 10px;
        margin-right: 20px;
    }

    #user a {
        text-decoration: none;
        padding: 5px 10px;
        background-color: #FDD29A;
        color: #414141;
        border-radius: 30px;
        transition: background-color 0.3s ease;
    }

    #user a:hover {
        background-color: #d5a7ea;
    }
    </style>
</head>

<body>
    <header>
        <div id="logo">KnowUrCat</div>
        <?php 
        if (isset($username) && $username == 'veronica torres') {

            echo '<div id="user">';
            echo '<a href="../model/login.php">Login</a>';
            echo '<a href="../model/register.php">Register</a>';
            echo '<a href="../model/logout.php">Salir</a>';
            echo '<a href="panel.php">Panel Adm</a>';
            echo '</div>';        } 
            
            else {

            echo '<div id="user">';
            echo '<a href="../model/login.php">Login</a>';
            echo '<a href="../model/register.php">Register</a>';
            echo '<a href="../model/logout.php">Salir</a>';            
            echo '</div>';        }


        ?>
    </header>

    <div id="content1">
        <img src="gato.png" alt="Gatos">
        <p>VT</p>
    </div>

    <center><h2>Bienvenido de nuevo, <?php echo $username?></h2></center>

    <div id="content2">
        <div id="gatitos">GATITOS</div>
        <div id="separator">_______________________________________________________________________________________________________________</div>

        <div class="flex-container">
    <a href="gato1.php?gato=Abyssinian">
        <img src="https://www.purina.es/sites/default/files/styles/ttt_image_original/public/2021-02/CAT%20BREED%20Hero%20Desktop_0044_Abyssinian.webp?itok=Kd8Ba4En" alt="Abyssinian">
    </a>
    <a href="gato2.php?gato=AmericanWirehair">
        <img src="https://www.purina.es/sites/default/files/styles/ttt_image_original/public/2021-02/CAT%20BREED%20Hero%20Desktop_0043_American_wirehair_OG.webp?itok=7bOrwybb" alt="American Wirehair">
    </a>
    <a href="gato3.php?gato=Asian">
        <img src="https://www.purina.es/sites/default/files/styles/ttt_image_original/public/2021-02/CAT%20BREED%20Hero%20Desktop_0042_Asian_OG.webp?itok=tL1dTEKT" alt="Asian">
    </a>
    <a href="gato4.php?gato=Balinese">
        <img src="https://www.purina.es/sites/default/files/styles/ttt_image_original/public/2021-02/CAT%20BREED%20Hero%20Desktop_0040_Balinese.webp?itok=fFqG9q47" alt="Balinese">
    </a>
</div>

        </div>
    </div>

    <div id="content3">
        <div id="funcionamiento">- FUNCIONAMIENTO -</div>

        <div id="texto">En esta plataforma web especializada en gatos, nos enfocamos en brindar informacion detallada sobre cada raza felina. Nuestro objetivo es ayudarte a conocer caracteristicas como recomendaciones practicas para cuidar y criar a tu felino de manera adecuada. Desde consejos sobre alimentacion y cuidados basicos, encontraras todo lo que necesitas para asegurarte de que tu mascota reciba el mejor cuidado posible. En resumen nuestra plataforma esta diseñada para ser tu fuente confiable de informacion sobre gatos. Ya sea que estes buscando aprender mas sobre una raza en particular, necesites consejos practicos para cuidar a tu gato o estes considerando la adopcion, estamos aqui para ayudarte en cada paso del hermoso camino de tener un gato.</div>
    </div>

    <div id="content4">
        <div class="contactame">
    <a href="instagram.com">
    <img class="ig" src="instagram.png" alt="Instagram">
    </a>
    <a href="Facebook.com">
    <img class="fc" src="facebook.png" alt="Facebook">
    </a>
    <a href="Whatsapp.com">
        <img class="wsp" src="whatsapp.png" alt="Whatsapp">
    </a>
    <a href="pinterest.com">
    <img class="pinterest" src="camino.png" alt="Pinterest">
    </a>
</div>

        </div>
    </div>

    </div>

    <script src="script.js"></script>
</body>

</html>
