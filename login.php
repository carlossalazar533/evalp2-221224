<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Usuarios definidos en el código
$usuarios = [
    "admin" => "1234",
    "usuario1" => "abcd",
];

// Inicializamos error
$error = "";

// Solo procesar POST si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Verificamos si el usuario existe y la contraseña coincide
    if (array_key_exists($usuario, $usuarios) && $usuarios[$usuario] === $password) {
        $_SESSION['usuario'] = $usuario;
        // Redirigir al dashboard
        header("Location: dashboard.php");
        exit(); // Siempre exit() después de header()
    } else {
        $error = "Usuario o contraseña es incorrecto";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
      body {
            /* Imagen de fondo funcional */
            background-image: url('https://images.pexels.com/photos/256369/pexels-photo-256369.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
        }


        h2 {
            text-align: center;
            color: #fff;
            margin-top: 50px;
        }

        form {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 30px;
            margin: 80px auto;
            width: 320px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.5);
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Login de Usuario</h2>
    <form method="post" action="">
        Usuario: <input type="text" name="usuario" required><br><br>
        Contraseña: <input type="password" name="password" required><br><br>
        <input type="submit" value="Ingresar">
    </form>
    <?php if($error !== "") echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
