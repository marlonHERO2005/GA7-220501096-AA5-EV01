<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['correo']) && isset($_POST['password'])) {
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        echo "correo: " . $correo . "<br>";
        echo "password: " . $password . "<br>";

        // Conexión a la base de datos (ajusta los valores según tu configuración)
        $servidor = "localhost";
        $usuario = "root";
        $contraseñabasedatos = "6745<>";
        $nombrebasedatos = "skinstore";

        $conn = new mysqli($servidor, $usuario, $contraseñabasedatos, $nombrebasedatos);

        // Verifica la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Realiza la consulta para verificar las credenciales
        $query = "SELECT * FROM usuario WHERE correo = '$correo' AND contraseña = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Inicio de sesión exitoso
            echo "Inicio de sesión exitoso.";
        } else {
            // Inicio de sesión fallido
            echo "Credenciales incorrectas.";
        }

        $conn->close();
    } else {
        echo "Datos de inicio de sesión incorrectos.";
    }
}
?>


