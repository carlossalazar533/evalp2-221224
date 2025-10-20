<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$error = "";
$resultado = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Limpiamos y validamos los valores
    $radio = filter_input(INPUT_POST, 'radio', FILTER_VALIDATE_FLOAT);
    $altura = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_FLOAT);
    $base = filter_input(INPUT_POST, 'base', FILTER_VALIDATE_FLOAT);
    $altura_rect = filter_input(INPUT_POST, 'altura_rect', FILTER_VALIDATE_FLOAT);

    // Verificar que todos sean números positivos
    if ($radio === false || $altura === false || $base === false || $altura_rect === false || 
        $radio <= 0 || $altura <= 0 || $base <= 0 || $altura_rect <= 0) {
        $error = "Todos los campos deben ser números positivos y mayores que cero";
    } else {
        // Área y volumen del cilindro
        $area_cil = 2 * pi() * $radio * ($radio + $altura);
        $vol_cil = pi() * pow($radio,2) * $altura;

        // Área y perímetro del rectángulo
        $area_rect = $base * $altura_rect;
        $perimetro_rect = 2 * ($base + $altura_rect);

        $resultado = [
            'area_cil' => round($area_cil, 2),
            'vol_cil' => round($vol_cil, 2),
            'area_rect' => round($area_rect, 2),
            'perimetro_rect' => round($perimetro_rect, 2)
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario Ejercicio 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
            background-color: #e2f0d9;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #b6d7a8;
        }

        .error {
            max-width: 400px;
            margin: 20px auto;
            background-color: #f8d7da;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>
    <h2>Ejercicio 2: Área y Volumen</h2>

    <?php if($error) echo "<div class='error'>$error</div>"; ?>

    <form method="post" action="">
        <h3>Cilindro</h3>
        Radio: <input type="number" step="0.01" min="0.01" name="radio" required><br>
        Altura: <input type="number" step="0.01" min="0.01" name="altura" required><br>

        <h3>Rectángulo</h3>
        Base: <input type="number" step="0.01" min="0.01" name="base" required><br>
        Altura: <input type="number" step="0.01" min="0.01" name="altura_rect" required><br>

        <input type="submit" value="Calcular">
    </form>

    <?php if(!empty($resultado)): ?>
    <div class="resultado">
        <h3>Resultados:</h3>
        <p>Área del cilindro: <?php echo $resultado['area_cil']; ?></p>
        <p>Volumen del cilindro: <?php echo $resultado['vol_cil']; ?></p>
        <p>Área del rectángulo: <?php echo $resultado['area_rect']; ?></p>
        <p>Perímetro del rectángulo: <?php echo $resultado['perimetro_rect']; ?></p>
    </div>
    <?php endif; ?>
</body>
</html>
