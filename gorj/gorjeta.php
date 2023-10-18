<?php 
include_once("php.php");
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Calculadora de Gorjeta</title>
</head>
<body>
    <h1 style="text-align: center;">Calculadora de Gorjeta</h1>

    <form method="post">
        Valor da conta: R$ <input type="text" name="valor_da_conta"><br>
        Selecione a porcentagem da gorjeta:
        <select name="porc">
            <option value="10">Excelente-10%</option>
            <option value="8">Ótimo-8%</option>
            <option value="5">Bom-5%</option>
            <option value="2">Péssimo-2%</option>
        </select><br>

        <button type="submit" value="Calcular Gorjeta">Calcular</button><br>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valorConta = isset($_POST["valor_da_conta"]) ? floatval($_POST["valor_da_conta"]) : 0;
        $porc = isset($_POST["porc"]) ? floatval($_POST["porc"]) : 0;

        $calculadora = new calcula();
        $calculadora->setValorDaConta($valorConta);

        $gorjeta = $calculadora->calcularGorjeta($porc);
        $total = $valorConta + $gorjeta;

        echo "Valor: R$ " . $calculadora->getValorDaConta() . "<br>";
        echo "Gorjeta: R$ " . $gorjeta . "<br>";
        echo "Total: R$ " . $total . "<br>";
    }
    ?>
    
    </form>
    

    
</body>
</html>
