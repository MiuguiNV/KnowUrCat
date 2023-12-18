<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Gato</title>
<style>
    body {
        background-image: url('fondo2.png');
    background-size: cover;
    font-family: 'Arial', sans-serif;

    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #414141;
}

form {
    max-width: 500px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin: 10px 0 5px;
    color: #414141;
}

input, textarea, select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #414141;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
}

button {
    background-color: #414141;
    color: #414141;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #414141;
}

/* Estilo para el fondo del formulario */
body {
    background-image: url('imagen_fondo.jpg'); /* Reemplaza 'imagen_fondo.jpg' con la URL de tu imagen */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

/* Estilo para la etiqueta select */
select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url('arrow-down.png'); /* Reemplaza 'arrow-down.png' con la flecha que desees */
    background-repeat: no-repeat;
    background-position: right center;
    padding-right: 25px; /* Ajusta según el ancho de la flecha */
}

</style>
</head>
<body>

<h1>Agregar Nuevo Gato</h1>

<form action="agregar.php" method="post">
    <label for="nombre_raza">Nombre de Raza:</label>
    <input type="text" name="nombre_raza" required>

    <label for="enfermedades_usuales">Enfermedades Usuales:</label>
    <textarea name="enfermedades_usuales"></textarea>

    <label for="alimentos_recomendados">Alimentos Recomendados:</label>
    <textarea name="alimentos_recomendados"></textarea>

    <label for="longevidad">Longevidad:</label>
    <input type="number" name="longevidad">

    <label for="tipo_pelaje">Tipo de Pelaje:</label>
    <input type="text" name="tipo_pelaje">

    <label for="pais_origen">País de Origen:</label>
    <input type="text" name="pais_origen">

    <label for="cuidados_especiales">Cuidados Especiales:</label>
    <textarea name="cuidados_especiales"></textarea>

    <label for="fertilidad">Fertilidad:</label>
    <select name="fertilidad">
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>

    <label for="recomendaciones">Recomendaciones:</label>
    <textarea name="recomendaciones"></textarea>

    <label for="datos_generales">Datos Generales:</label>
    <textarea name="datos_generales"></textarea>

    <button type="submit">Agregar Gato</button>
</form>

</body>
</html>
