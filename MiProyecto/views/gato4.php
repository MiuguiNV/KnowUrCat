<?php
include("../controller/conexion.php");

session_start();


$username = $_SESSION['username'];

// Obtener los datos del gato con ID 3
$idGato = 7; // Puedes cambiar este valor según el ID que desees obtener

// Verificar si se está enviando un formulario de modificación
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los datos del formulario de modificación
    $nombreRaza = mysqli_real_escape_string($conn, $_POST['nombre_raza']);
    $enfermedadesUsuales = isset($_POST['enfermedades_usuales']) ? mysqli_real_escape_string($conn, $_POST['enfermedades_usuales']) : '';
    $alimentosRecomendados = isset($_POST['alimentos_recomendados']) ? mysqli_real_escape_string($conn, $_POST['alimentos_recomendados']) : '';
    $longevidad = isset($_POST['longevidad']) ? (int)$_POST['longevidad'] : '';
    $tipoPelaje = isset($_POST['tipo_pelaje']) ? mysqli_real_escape_string($conn, $_POST['tipo_pelaje']) : '';
    $paisOrigen = isset($_POST['pais_origen']) ? mysqli_real_escape_string($conn, $_POST['pais_origen']) : '';
    $cuidadosEspeciales = isset($_POST['cuidados_especiales']) ? mysqli_real_escape_string($conn, $_POST['cuidados_especiales']) : '';
    $fertilidad = isset($_POST['fertilidad']) ? (int)$_POST['fertilidad'] : '';
    $recomendaciones = isset($_POST['recomendaciones']) ? mysqli_real_escape_string($conn, $_POST['recomendaciones']) : '';
    $datosGenerales = isset($_POST['datos_generales']) ? mysqli_real_escape_string($conn, $_POST['datos_generales']) : '';

    // Actualizar los datos del gato en la base de datos
    $consulta = "UPDATE GATOS SET 
    NombreRaza = '$nombreRaza',
    EnfermedadesUsuales = '$enfermedadesUsuales',
    AlimentosRecomendados = '$alimentosRecomendados',
    Longevidad = " . ($longevidad !== '' ? $longevidad : 'NULL') . ",
    TipoPelaje = '$tipoPelaje',
    PaisOrigen = '$paisOrigen',
    CuidadosEspeciales = '$cuidadosEspeciales',
    Fertilidad = " . ($fertilidad !== '' ? $fertilidad : 'NULL') . ",
    Recomendaciones = '$recomendaciones',
    DatosGenerales = '$datosGenerales'
    WHERE ID = $idGato";


    $conn->query($consulta);

    // Redirigir a la misma página para mostrar los resultados actualizados
    header('Location: gato4.php');
    exit(); // Asegurarse de que el script se detenga después de la redirección
}

// Consultar la base de datos para obtener los datos del gato
$consultaGato = "SELECT * FROM GATOS WHERE ID = $idGato";
$resultadoGato = $conn->query($consultaGato);

// Verificar si se encontraron resultados
if ($resultadoGato->num_rows > 0) {
    $gato = $resultadoGato->fetch_assoc();

    // Almacenar datos en variables
    $nombreRaza = $gato['NombreRaza'];
    $enfermedadesUsuales = $gato['EnfermedadesUsuales'];
    $alimentosRecomendados = $gato['AlimentosRecomendados'];
    $longevidad = $gato['Longevidad'];
    $tipoPelaje = $gato['TipoPelaje'];
    $paisOrigen = $gato['PaisOrigen'];
    $cuidadosEspeciales = $gato['CuidadosEspeciales'];
    $fertilidad = $gato['Fertilidad'];
    $recomendaciones = $gato['Recomendaciones'];
    $datosGenerales = $gato['DatosGenerales'];
}

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <title>Modificar Gato</title>
    <style>
     body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .gato-container {
            background-image: url('fondo1.png');
            background-size: cover;
            opacity: 0.8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;  
        }

        .gato {
            font-family: 'Luminari', sans-serif;
            width: 350px;
            margin: 20px;
            padding: 20px;
            border: 2px solid #414141;
            border-radius: 10px;
            background-color: #fff;
            overflow: hidden; /* Limpiar el float */
        }

        .gato img {
            max-width: 50%;
            height: auto;
            float: left; /* Cambiado a left para que la imagen esté a la izquierda */   
            
        }

        .contenido {
            font-family: 'Luminari', sans-serif;
            font-size: 17px;
            width: 700px;
            margin: 20px;
            padding: 20px;
            border: 2px solid #414141;
            border-radius: 10px;
            text-align: left;
            background-color: #fff;
            overflow: hidden; /* Limpiar el float */
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }
/* gatoheader */
        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
        
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
    header {
    background-color: #414141;
    color: #fdd29a;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
/* gatoheader */
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
            echo '<a href="miproyecto.php">Atras</a>';  
            echo '</div>';        } 
            
            else {

            echo '<div id="user">';
            echo '<a href="../model/login.php">Login</a>';
            echo '<a href="../model/register.php">Register</a>';
            echo '<a href="../model/logout.php">Salir</a>'; 
            echo '<a href="miproyecto.php">Atras</a>';           
            echo '</div>';        }


        ?>
    </header>
<div class="gato-container">
        <div class="gato">
            <img class="gato3" src="gato4.png" alt="Imagen de gato">
        </div>
        <div class="contenido">
            <?php
echo "Nombre de Raza: $nombreRaza<br>";
echo "Enfermedades Usuales: $enfermedadesUsuales<br>";
echo "Alimentos Recomendados: $alimentosRecomendados<br>";
echo "Longevidad: $longevidad<br>";
echo "Tipo de Pelaje: $tipoPelaje<br>";
echo "País de Origen: $paisOrigen<br>";
echo "Cuidados Especiales: $cuidadosEspeciales<br>";
echo "Fertilidad: $fertilidad<br>";
echo "Recomendaciones: $recomendaciones<br>";
echo "Datos Generales: $datosGenerales<br>";
       ?>
        </div>
    </div>
<?php
if (isset($_SESSION['username']) && $_SESSION['username'] === 'veronica torres') {
?>  

<h1>Modificar Gato</h1>

<form action="gato4.php" method="post">
    
    <label for="nombre_raza">Nombre de Raza:</label>
    <input type="text" name="nombre_raza" value="<?php echo htmlspecialchars($nombreRaza); ?>">
    
    <label for="enfermedades_usuales">Enfermedades Usuales:</label>
    <textarea name="enfermedades_usuales"><?php echo htmlspecialchars($enfermedadesUsuales); ?></textarea>

    <label for="alimentos_recomendados">Alimentos Recomendados:</label>
    <textarea name="alimentos_recomendados"><?php echo htmlspecialchars($alimentosRecomendados); ?></textarea>

    <label for="longevidad">Longevidad:</label>
    <input type="number" name="longevidad" value="<?php echo htmlspecialchars($longevidad); ?>">

    <label for="tipo_pelaje">Tipo de Pelaje:</label>
    <input type="text" name="tipo_pelaje" value="<?php echo htmlspecialchars($tipoPelaje); ?>">

    <label for="pais_origen">País de Origen:</label>
    <input type="text" name="pais_origen" value="<?php echo htmlspecialchars($paisOrigen); ?>">

    <label for="cuidados_especiales">Cuidados Especiales:</label>
    <textarea name="cuidados_especiales"><?php echo htmlspecialchars($cuidadosEspeciales); ?></textarea>

    <label for="fertilidad">Fertilidad:</label>
    <select name="fertilidad">
        <option value="1" <?php echo ($fertilidad == 1) ? 'selected' : ''; ?>>Sí</option>
        <option value="0" <?php echo ($fertilidad == 0) ? 'selected' : ''; ?>>No</option>
    </select>

    <label for="recomendaciones">Recomendaciones:</label>
    <textarea name="recomendaciones"><?php echo htmlspecialchars($recomendaciones); ?></textarea>

    <label for="datos_generales">Datos Generales:</label>
    <textarea name="datos_generales"><?php echo htmlspecialchars($datosGenerales); ?></textarea>

    <!-- Botón para guardar las modificaciones -->
    <button type="submit">Guardar Modificaciones</button>
</form>
<?php
}else{
    ?><br><?php
    echo"Espero que esta informacion te haya sido de ayuda <3";
}
?>
</body>
</html>