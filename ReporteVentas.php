<?php
// Configuración de la base de datos
$server = "localhost";
$user = "root";
$pass = "";
$db = "Ganaderia";

// Crear conexión
$conexion = mysqli_connect($server, $user, $pass, $db);

// Verificar conexión
if ($conexion->connect_errno) {
    die("Conexión fallida: " . $conexion->connect_error);
}


// Consultar datos
$consulta = "SELECT * FROM ventaganado";
$guardar = $conexion->query($consulta);

if (!$guardar) {
    die("Error en la consulta: " . $conexion->error);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" type="text/css" href="ReporteVentas.css">
    <link rel="icon" type="image/jpg" href="toro1.jpg">
</head>
<body>
    <div class="titulin">
        <h1>GANADERIA EL ROSARIO</h1>
        <a href="ADMINISTRADORES.php">
            <img src="flechaatras.jpg" alt="Botón Atrás" class="boton-atras">
        </a>
    </div> 
    <main>
        <section class="container">
            <h3>Reporte de Ventas</h3>
            <div class="tabla">
                <div class="uno">
                    <table border="1" class="table">
                        <thead>
                            <tr>
                            <th>ID Ventas</th>
                            <th>Reemo</th>
                            <th>Destino</th>
                            <th>Razon de Venta</th>
                            <th>PesoVenta</th>
                            <th>PrecioVenta</th>
                            <th>Ganancia</th>
                            <th>FechaVenta</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = $guardar->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['idVenta']); ?></td>
                                <td><?php echo htmlspecialchars($row['N_Reemo']); ?></td>
                                <td><?php echo htmlspecialchars($row['Destino']); ?></td>
                                <td><?php echo htmlspecialchars($row['TipoVenta']); ?></td>
                                <td><?php echo htmlspecialchars($row['PesoVenta']); ?></td>
                                <td><?php echo htmlspecialchars($row['PrecioVenta']); ?></td>
                                <td><?php echo htmlspecialchars($row['Ganancia']); ?></td>
                                <td><?php echo htmlspecialchars($row['FechaVenta']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
</html>

<?php
// Cerrar la conexión
$conexion->close();
?>
