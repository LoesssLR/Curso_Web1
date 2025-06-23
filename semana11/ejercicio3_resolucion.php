<?php
// Verifica si se ha enviado el formulario
if ($_POST) {
    $numero = $_POST['numero'];  // Captura el número ingresado
    $divisores = [];             // Array para almacenar los divisores
    $i = 1;                      // Inicia el contador desde 1

    // Mientras el contador sea menor o igual al número ingresado
    while ($i <= $numero) {
        // Si el número es divisible por $i, lo agrega a los divisores
        if ($numero % $i == 0) {
            $divisores[] = $i;
        }
        $i++;  // Incrementa el contador
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado</h1>

    <!-- Muestra el número y sus divisores -->
    <p>Los divisores de <?php echo $numero; ?> son:</p>
    <ul>
        <?php 
        // Muestra todos los divisores en una lista
        foreach ($divisores as $divisor): ?>
            <li><?php echo $divisor; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
