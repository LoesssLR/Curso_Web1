<?php
require_once 'autenticacion.php';
require_once 'conexion.php';

redirectIfNotLoggedIn();

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM personas WHERE id = ?");
$stmt->execute([$id]);
$persona = $stmt->fetch();

if (!$persona) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="contenedor_registro">
        <h1>Editar Persona</h1>
        
        <form action="acciones.php" method="post">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $persona['id']; ?>">
            
            <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo htmlspecialchars($persona['cedula']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($persona['nombre']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" value="<?php echo htmlspecialchars($persona['edad']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" value="<?php echo htmlspecialchars($persona['telefono']); ?>">
            </div>
            
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($persona['correo']); ?>">
            </div>
            
            <div class="form-group">
                <label>Género:</label>
                <div class="radio-group">
                    <label><input type="radio" name="genero" value="Masculino" <?php echo $persona['genero'] === 'Masculino' ? 'checked' : ''; ?> required> Masculino</label>
                    <label><input type="radio" name="genero" value="Femenino" <?php echo $persona['genero'] === 'Femenino' ? 'checked' : ''; ?>> Femenino</label>
                    <label><input type="radio" name="genero" value="Otro" <?php echo $persona['genero'] === 'Otro' ? 'checked' : ''; ?>> Otro</label>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn">Actualizar</button>
                <a href="dashboard.php" class="btn cancel">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>