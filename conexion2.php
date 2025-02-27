<?php
// Configuración de la base de datos
$host = 'localhost'; // o la IP de tu servidor MariaDB
$usuario = 'root'; // Usuario de MariaDB
$contraseña = ''; // Contraseña del usuario de MariaDB (deja vacío si no tienes contraseña)
$base_de_datos = 'biblioteca1'; // Nombre de la base de datos

// Crear la conexión usando MySQLi
$conn = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos del formulario
$user = $_POST['username'];  // Obtener el nombre de usuario desde el formulario

// Consulta para verificar si el nombre de usuario existe
$sql = "SELECT * FROM Usuario WHERE Nombre_Usuario = '$user'"; // Asegúrate que 'Usuario' y 'Nombre_Usuario' son correctos
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si el nombre de usuario existe, significa que la autenticación fue exitosa
    echo "Bienvenido, " . $user . "<br><br>";

    // Mostrar el menú para hacer un préstamo
    echo '<h3>Menú de Opciones:</h3>';
    echo '<ul>';
    echo '<li><a href="realizar_prestamo.php">Realizar un préstamo</a></li>';
    echo '<li><a href="ver_prestamos.php">Ver mis préstamos</a></li>';
    echo '<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>';
    echo '</ul>';
} else {
    // Si no hay resultados, significa que el nombre de usuario no es correcto
    echo "Nombre de usuario incorrecto.";
}

// Cerrar la conexión
$conn->close();
?>
