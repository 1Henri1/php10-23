<?php 
    include_once("php.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Jogo da Memória</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="title">
        <p class="titulo">
        <?php
          echo $_POST['nome'];
          setcookie(time()+05*60);
        ?> 
        </p>   
        </h3>
    <h1>Jogo da Memória</h1>
    <div>
        Tentativas: <span id="tentativas">0</span><br>
        vitórias: <span id="vitorias">0</span><br>
        Derrotas: <span id="derrotas">0</span><br>
        <button onclick="reiniciarJogo()">Reiniciar</button>
    </div>
</div>

    <div id="tabuleiro">
        <?php
        $jogo = new JogoMemoria();
        $cartas = $jogo->getCartas();

        foreach ($cartas as $carta) {
            echo '<div class="carta" id="' . $carta->getId() . '"><img src="' . $carta->getImagem() . '.jpg" alt="Carta"></div>';
        }
        ?>
    </div>
    <script src="js.js"></script>
</body>
</html>