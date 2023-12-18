<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("../controller/conexion.php");

    // Recoger los datos del formulario
    $nombreRaza = $_POST['nombre_raza'];
    $enfermedadesUsuales = isset($_POST['enfermedades_usuales']) ? $_POST['enfermedades_usuales'] : '';
    $alimentosRecomendados = isset($_POST['alimentos_recomendados']) ? $_POST['alimentos_recomendados'] : '';
    $longevidad = isset($_POST['longevidad']) ? $_POST['longevidad'] : null;
    $tipoPelaje = isset($_POST['tipo_pelaje']) ? $_POST['tipo_pelaje'] : '';
    $paisOrigen = isset($_POST['pais_origen']) ? $_POST['pais_origen'] : '';
    $cuidadosEspeciales = isset($_POST['cuidados_especiales']) ? $_POST['cuidados_especiales'] : '';
    $fertilidad = isset($_POST['fertilidad']) ? $_POST['fertilidad'] : null;
    $recomendaciones = isset($_POST['recomendaciones']) ? $_POST['recomendaciones'] : '';
    $datosGenerales = isset($_POST['datos_generales']) ? $_POST['datos_generales'] : '';

    // Insertar el nuevo gato en la base de datos
    $consulta = "INSERT INTO GATOS (NombreRaza, EnfermedadesUsuales, AlimentosRecomendados, Longevidad, TipoPelaje, PaisOrigen, CuidadosEspeciales, Fertilidad, Recomendaciones, DatosGenerales) 
                 VALUES ('$nombreRaza', '$enfermedadesUsuales', '$alimentosRecomendados', $longevidad, '$tipoPelaje', '$paisOrigen', '$cuidadosEspeciales', $fertilidad, '$recomendaciones', '$datosGenerales')";
    $conn->query($consulta);

    // Cerrar la conexión
    $conn->close();
}

// Redirigir a la página principal
header('Location: miproyecto.php');
?>
