<?php
require_once 'autenticacion.php';
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (login($pdo, $username, $password)) {

    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}

redirectIfNotLoggedIn();

$stmt = $pdo->query("SELECT * FROM personas ORDER BY created_at DESC");
$personas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="contenedor_dashboard">
        <header>
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            <a href="?logout" class="btn logout">Cerrar Sesión</a>
        </header>
        
        <?php if (isset($error)): ?>
            <div class="alert error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="actions">
            <a href="registrar_persona.php" class="btn">Registrar Nueva Persona</a>
        </div>
        
        <div class="personas-list">
            <h2>Personas Registradas</h2>
            
            <?php if (empty($personas)): ?>
                <p>No hay personas registradas.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Género</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($personas as $persona): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($persona['cedula']); ?></td>
                                <td><?php echo htmlspecialchars($persona['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($persona['edad']); ?></td>
                                <td><?php echo htmlspecialchars($persona['telefono']); ?></td>
                                <td><?php echo htmlspecialchars($persona['correo']); ?></td>
                                <td><?php echo htmlspecialchars($persona['genero']); ?></td>
                                <td class="actions">
                                    <a href="editar.php?id=<?php echo $persona['id']; ?>" class="btn edit">Editar</a>
                                    <a href="acciones.php?action=delete&id=<?php echo $persona['id']; ?>" 
                                       class="btn delete" 
                                       onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
    
    <?php
    if (isset($_GET['logout'])) {
        logout();
    }
    ?>
</body>
</html>