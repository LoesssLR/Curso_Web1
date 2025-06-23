<?php
require_once 'autenticacion.php';
require_once 'conexion.php';

redirectIfNotLoggedIn();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Persona</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="contenedor_registro">
        <h1>Registrar Nueva Persona</h1>
        
        <form action="acciones.php" method="post">
            <input type="hidden" name="action" value="create">
            
            <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" id="cedula" name="cedula" required>
            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" required>
            </div>
            
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono">
            </div>
            
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo">
            </div>
            
            <div class="form-group">
                <label>Género:</label>
                <div class="radio-group">
                    <label><input type="radio" name="genero" value="Masculino" required> Masculino</label>
                    <label><input type="radio" name="genero" value="Femenino"> Femenino</label>
                    <label><input type="radio" name="genero" value="Otro"> Otro</label>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn">Guardar</button>
                <a href="dashboard.php" class="btn cancel">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>