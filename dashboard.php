<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }

        /* Navbar */
        .navbar {
            background-color: #007BFF;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #0056b3;
        }

        .welcome {
            color: white;
            font-weight: bold;
        }

        /* Contenido principal */
        .container {
            padding: 20px;
            text-align: center;
        }

        .container h2 {
            color: #333;
        }

        .exercise-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .exercise-links a {
            display: block;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            transition: transform 0.2s, background-color 0.2s;
        }

        .exercise-links a:hover {
            background-color: #e6f0ff;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="welcome">Bienvenido, <?php echo $_SESSION['usuario']; ?>!</div>
        <div>
            <a href="logout.php">Cerrar sesión</a>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="container">
        <h2>Panel de Ejercicios</h2>
        <div class="exercise-links">
            <a href="login.php">Ejercicio 1: Login</a>
            <a href="formulario.php">Ejercicio 2: Área y Volumen</a>
            <a href="triangulo.php">Ejercicio 3: Triángulo</a>
        </div>
    </div>

</body>
</html>
