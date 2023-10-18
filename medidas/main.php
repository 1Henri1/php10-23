<?php
include_once("php.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Conversor de Unidades</title>
</head>
<body>
    <h1 style="text-align: center;">Conversor de Unidades</h1>

    <form method="post">
        Valor: <input type="text" name="valor"><br>
        De:
        <select name="unidade_entrada">
            <option value="metro">Metro (m)</option>
            <option value="quilometro">Quilômetro (km)</option>
            <option value="centimetro">Centímetro (cm)</option>
            <option value="milimetro">Milímetro (mm)</option>
        </select><br>
        Para:
        <select name="unidade_saida">
            <option value="metro">Metro (m)</option>
            <option value="quilometro">Quilômetro (km)</option>
            <option value="centimetro">Centímetro (cm)</option>
            <option value="milimetro">Milímetro (mm)</option>
        </select><br>
        <button type="submit" value="Converter">Converter</button>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor = isset($_POST["valor"]) ? floatval($_POST["valor"]) : 0;
        $unidadeEntrada = isset($_POST["unidade_entrada"]) ? $_POST["unidade_entrada"] : "";
        $unidadeSaida = isset($_POST["unidade_saida"]) ? $_POST["unidade_saida"] : "";

        $conversor = new ConversorUnidades();
        $conversor->setValor($valor);
        $conversor->setUnidadeEntrada($unidadeEntrada);
        $conversor->setUnidadeSaida($unidadeSaida);

        $resultado = $conversor->converter();

        echo "<h2>Resultado:</h2>";
        echo $resultado."<br><br>";
        echo $valor . " " . $unidadeEntrada."(s)" . " é igual a " . $resultado . " " . $unidadeSaida."(s)";
    }

    
    ?>
    </form>

    
</body>
</html>
