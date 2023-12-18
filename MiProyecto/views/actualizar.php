<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    include("../controller/conexion.php");


    // Recoger los datos del formulario
    $id = $_POST['id'];
    $nombreRaza = $_POST['nombre_raza'];
    // Añade aquí los demás campos según tu estructura de base de datos

    // Actualizar el gato en la base de datos
    $consulta = "UPDATE GATOS SET NombreRaza='$nombreRaza' WHERE ID = $id";
    // Añade aquí los demás campos según tu estructura de base de datos
    $conexion->query($consulta);

    // Cerrar la conexión
    $conexion->close();
}

// Redirigir a la página principal
header('Location: index.html');
?>
