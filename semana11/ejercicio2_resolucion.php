<?php
// Inicializa las variables vacías para evitar errores si no se ha enviado el formulario
$numero = "";
$cuadrado = "";

// Verifica si se ha enviado el formulario por el método POST
if ($_POST) {
    $numero = $_POST['numero'];        // Captura el número ingresado
    $cuadrado = $numero * $numero;     // Calcula el cuadrado del número
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cálculo de cuadrados</h1>

    <!-- Formulario que envía los datos a sí mismo (misma página) -->
    <form action="" method="post">
        <label for="numero">Digite un número</label>
        <input type="number" name="numero" id="numero" placeholder="Escriba un número">

        <button type="submit">Calcular</button>

        <h2>Resultado</h2>

        <!-- Imprime el resultado solo si hay un número -->
        <?php if ($numero !== ""): ?>
        <p>El cuadrado de <?php echo $numero; ?> es <?php echo $cuadrado; ?></p>
        <?php endif; ?>
        <!-- El resultado solo se mostrará cuando el usuario envíe el formulario. Si se carga la página por primera vez, no se verá ningún mensaje vacío. -->
    </form>
</body>
</html>
