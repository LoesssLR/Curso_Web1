<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del cálculo</title>
</head>
<body>
    <h1>Resultado del cálculo</h1>

    <?php
    // Verifica si el formulario fue enviado mediante POST
    if ($_POST) {
        // Recupera los valores enviados desde el formulario
        $base = $_POST['base'];
        $altura = $_POST['altura'];

        // Calcula el área del rectángulo
        $area = $base * $altura;

        // Muestra el resultado
        echo "<p>El área del rectángulo con base $base y altura $altura es: $area</p>";
    }
    ?>

    <!-- Enlace para regresar al formulario -->
    <a href="ejercicio.html">Volver</a>
</body>
</html>
