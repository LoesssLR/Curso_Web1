<?php
session_start();

function login($pdo, $username, $password) {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        return true;
    }
    return false;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function logout() {
    session_destroy();
    header("Location:index.html");
    exit;
}

function redirectIfNotLoggedIn() {
    if (!isLoggedIn()) {
        header("Location:index.html");
        exit;
    }
}

?>