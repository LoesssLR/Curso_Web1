<?php

/* Conexion a la base de datos */

$host = "localhost";
$db = "personajes";
$usuario = "root";
$password = "";

try {
    /* Crear la conexion */
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usuario, $password);
    echo "Conexion exitosa";
} catch (PDOException $e) {
    echo "Conexion fallida: " . $e->getMessage();
}

/* Seleccionar los personajes */
echo "<br>";

/* Busqueda por un ID */
$id = 2;
$statement = $pdo->prepare("SELECT * FROM personas WHERE id = ?");
$statement->execute([$id]); // ejecuta la consulta PHP
$persona = $statement->fetch(); // se obtiene el registro

if ($persona) {
    echo "Nombre: {$persona['nombre']} {$persona['apellido']} {$persona['nacionalidad']}";
} else {
    echo "No se encontró el personaje $id";
}

/* Busqueda por todos los personajes */
echo "<br>";
$statement = $pdo->query("SELECT * FROM personas");
$personas = $statement->fetchAll(); // se obtienen todos los registros

foreach ($personas as $persona) {
    echo "Nombre: {$persona['nombre']} {$persona['apellido']} {$persona['nacionalidad']}";
    echo "<br>";
}

/* Insercion en la base de datos */
echo "<br>";
$query = $pdo->prepare("INSERT INTO personas (nombre, apellido, nacionalidad) VALUES (?, ?, ?)");
if ($query->execute(["Luis", "López", "Costarricense"])) {
    echo "Inserción exitosa";
} else {
    echo "Inserción fallida";
}

/* Insercion en la base de datos con un array asociativo */
echo "<br>";
$nuevoPersonaje = [
    "nombre" => "Eladio", 
    "apellido" => "Carrion", 
    "nacionalidad" => "Puertorriqueño"
];

$statement = $pdo->prepare("INSERT INTO personas (nombre, apellido, nacionalidad) VALUES (:nombre, :apellido, :nacionalidad)");
$statement->execute($nuevoPersonaje);
echo "Inserción exitosa";
echo "<br>";

/* Actualizacion en la base de datos */
$datosActualizar = [
    "apellido_busqueda" => "López",
    "apellido_nuevo" => "West"
];
$statement = $pdo->prepare("UPDATE personas SET apellido = :apellido_nuevo WHERE apellido = :apellido_busqueda");
$statement->execute($datosActualizar);
echo "Actualización exitosa";
echo "<br>";

/* Actualizacion de varios campos en la BD */
$datos = [
    "nombre_busqueda" => "Shakira",
    "apellido_nuevo" => "Piqué",
    "nacionalidad_nueva" => "Peruana"
];
$statement = $pdo->prepare("UPDATE personas SET apellido = :apellido_nuevo, nacionalidad = :nacionalidad_nueva WHERE nombre = :nombre_busqueda");
$statement->execute($datos);
echo "Actualización exitosa";
echo "<br>";

/* Eliminacion un ID especifico de la BD */
$idEliminar = 3;
$statement = $pdo->prepare("DELETE FROM personas WHERE id = ?");
$statement->execute([$idEliminar]);
if ($statement->rowCount() > 0) {
    echo "Eliminación exitosa";
} else {
    echo "Eliminación fallida";
}
echo "<br>";

/* Eliminacion de todos los registros de la BD */
$statement = $pdo->query("DELETE FROM personas");
if ($statement->rowCount() > 0) {
    echo "Eliminación exitosa";
} else {
    echo "Eliminación fallida";
}

?>