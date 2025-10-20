<?php
session_start();

// Si no hay usuario logueado, redirigir al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h2>
    <p>Este es tu dashboard.</p>
    <a href="logout.php">Cerrar sesióng</a>
</body>
</html>
