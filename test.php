<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "Ganaderia";

$conexion = mysqli_connect($server, $user, $pass, $db);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

echo "Conexión exitosa a la base de datos.<br>";

$consulta = "SELECT * FROM Empleados";
$guardar = $conexion->query($consulta);

if (!$guardar) {
    die("Error en la consulta: " . $conexion->error);
} else {
    while ($row = $guardar->fetch_assoc()) {
        echo "ID: " . $row['idEmpleado'] . " - Nombre: " . $row['Nombre'] . "<br>";
    }
}

$conexion->close();
?>
