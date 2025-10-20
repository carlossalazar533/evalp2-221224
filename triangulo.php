<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$error = "";
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Capturar lados
    $a = filter_input(INPUT_POST, 'lado1', FILTER_VALIDATE_FLOAT);
    $b = filter_input(INPUT_POST, 'lado2', FILTER_VALIDATE_FLOAT);
    $c = filter_input(INPUT_POST, 'lado3', FILTER_VALIDATE_FLOAT);

    // Validar que sean números positivos
    if ($a === false || $b === false || $c === false || $a <= 0 || $b <= 0 || $c <= 0) {
        $error = "Los lados deben ser números positivos.";
    }
    // Validar desigualdad triangular
    elseif (($a + $b <= $c) || ($a + $c <= $b) || ($b + $c <= $a)) {
        $error = "Los lados no cumplen la desigualdad triangular.";
    } else {
        // Clasificar triángulo
        if ($a == $b && $b == $c) {
            $resultado = "Equilátero ✅";
            $color = "#4CAF50"; // verde
            $icono = "https://img.icons8.com/emoji/48/000000/green-circle-emoji.png";
        } elseif ($a == $b || $a == $c || $b == $c) {
            $resultado = "Isósceles ⚠️";
            $color = "#FF9800"; // naranja
            $icono = "https://img.icons8.com/emoji/48/000000/orange-circle-emoji.png";
        } else {
            $resultado = "Escaleno ❌";
            $color = "#F44336"; // rojo
            $icono = "https://img.icons8.com/emoji/48/000000/red-circle-emoji.png";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 3: Triángulo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .resultado {
            max-width: 400px;
            margin: 20px auto;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .error {
            max-width: 400px;
            margin: 20px auto;
            background-color: #f8d7da;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #f5c6cb;
            color: #721c24;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Ejercicio 3: Clasificación de Triángulos</h2>

    <?php if($error) echo "<div class='error'>$error</div>"; ?>

    <form method="post" action="">
        Lado 1: <input type="number" name="lado1" step="0.01" min="0.01" required><br>
        Lado 2: <input type="number" name="lado2" step="0.01" min="0.01" required><br>
        Lado 3: <input type="number" name="lado3" step="0.01" min="0.01" required><br>
        <input type="submit" value="Clasificar">
    </form>

    <?php if($resultado): ?>
        <div class="resultado" style="background-color: <?php echo $color; ?>; color: white;">
            <img src="<?php echo $icono; ?>" alt="icono" width="30" height="30">
            <?php echo $resultado; ?>
        </div>
    <?php endif; ?>
</body>
</html>
