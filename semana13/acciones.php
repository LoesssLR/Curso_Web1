<?php
require_once 'autenticacion.php';
require_once 'conexion.php';

redirectIfNotLoggedIn();

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['action'])) {
    $action = $_POST['action'] ?? $_GET['action'] ?? '';
    
    try {
        switch ($action) {
            case 'create':
                $stmt = $pdo->prepare("INSERT INTO personas (cedula, nombre, edad, telefono, correo, genero) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $_POST['cedula'],
                    $_POST['nombre'],
                    $_POST['edad'],
                    $_POST['telefono'],
                    $_POST['correo'],
                    $_POST['genero']
                ]);
                $_SESSION['message'] = "Persona registrada exitosamente";
                break;
                
            case 'update':
                $stmt = $pdo->prepare("UPDATE personas SET cedula = ?, nombre = ?, edad = ?, telefono = ?, correo = ?, genero = ? WHERE id = ?");
                $stmt->execute([
                    $_POST['cedula'],
                    $_POST['nombre'],
                    $_POST['edad'],
                    $_POST['telefono'],
                    $_POST['correo'],
                    $_POST['genero'],
                    $_POST['id']
                ]);
                $_SESSION['message'] = "Persona actualizada exitosamente";
                break;
                
            case 'delete':
                if (isset($_GET['id'])) {
                    $stmt = $pdo->prepare("DELETE FROM personas WHERE id = ?");
                    $stmt->execute([$_GET['id']]);
                    $_SESSION['message'] = "Persona eliminada exitosamente";
                }
                break;
                
            default:
                $_SESSION['error'] = "Acción no válida";
                break;
        }
    } catch (PDOException $e) {
        if ($e->getCode() == '23000') {
            $_SESSION['error'] = "La cédula ya está registrada";
        } else {
            $_SESSION['error'] = "Error en la base de datos: " . $e->getMessage();
        }
    }
    
    header("Location: dashboard.php");
    exit;
}

header("Location: dashboard.php");
exit;
?>