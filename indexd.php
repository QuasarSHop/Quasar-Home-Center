<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos de Mueblería</title>
</head>
<body>
    <h1>Productos de Mueblería</h1>
    <ul>
    <?php
    // Datos de conexión a la base de datos
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_de_datos = 'quasar';

    // Crear una conexión a la base de datos
    $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

    // Verificar si hay errores en la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta SQL para seleccionar todos los productos de la categoría "Mueblería"
    $sql = "SELECT * FROM `producto` WHERE 1";

    // Ejecutar la consulta
    $resultado = $conexion->query($sql);

    // Verificar si la consulta se realizó con éxito
    if ($resultado) {
        // Imprimir los resultados en una lista
        while ($fila = $resultado->fetch_assoc()) {
            echo "<li>";
            echo "ID del Producto: " . $fila['idProducto'] . "<br>";
            echo "Nombre: " . $fila['nombre'] . "<br>";
            echo "Descripción: " . $fila['descripcion'] . "<br>";
            echo "Catalogo: " . $fila['idCatalogo'] . "<br>";
            echo "Precio: $" . $fila['Precio'] . "<br>";
            echo "</li>";
        }

        // Liberar el resultado
        $resultado->free();
    } else {
        echo "Error en la consulta: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
    ?>
    </ul>
</body>
</html>
