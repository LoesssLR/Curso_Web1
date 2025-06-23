<?php
require_once 'conexion.php';
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = "Usuario y contraseña son requeridos";
    } elseif ($password !== $confirm_password) {
        $error = "Las contraseñas no coinciden";
    } else {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashed_password]);
            
            $_SESSION['message'] = "Registro exitoso. Ahora puedes iniciar sesión.";
            header("Location: index.html");
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                $error = "El nombre de usuario ya existe";
            } else {
                $error = "Error en el registro: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="contenedor_registro">
        <h1>Registro de Usuario</h1>
        
        <?php if ($error): ?>
            <div class="alert error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="post">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmar Contraseña:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn">Registrarse</button>
            <div class="register-link">
                ¿Ya tienes una cuenta? <a href="index.html">Inicia sesión aquí</a>
            </div>
        </form>
    </div>
</body>
</html>