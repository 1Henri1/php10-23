<!DOCTYPE html>
<html>
<head>
    <title>Jogo da Memória</title>
    <style>
        .carta {
            width: 18vw;
            height: 18vw;
            background: #00ffff;
            margin: 20px;
            padding: 20px;
            text-align: center;
            line-height: 100px;
            font-size: 24px;
            cursor: pointer;
            display: inline-block;

        }

        .carta img {
            width: 18vw;
            height: 18vw;
            display: none;
        }

        .virada img {
            display: block;
        }
    </style>
</head>
<body>
    <h1>Jogo da Memória</h1>

    <div>
        Tentativas: <span id="tentativas">0</span>
        <button onclick="reiniciarJogo()">Reiniciar</button>
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

    <script>
        var cartasViradas = [];
        var paresEncontrados = 0;
        var tentativas = 0;

        function virarCarta(id) {
            var carta = document.getElementById(id);
            if (cartasViradas.length < 2 && !carta.classList.contains('virada')) {
                carta.classList.add('virada');
                cartasViradas.push(carta);

                var imagens = carta.getElementsByTagName('img');
                for (var i = 0; i < imagens.length; i++) {
                    imagens[i].style.display = 'block';
                }

                if (cartasViradas.length === 2) {
                    var carta1 = cartasViradas[0];
                    var carta2 = cartasViradas[1];

                    var img1 = carta1.querySelector('img').getAttribute('src');
                    var img2 = carta2.querySelector('img').getAttribute('src');

                    if (img1 === img2) {
                        cartasViradas = [];
                        paresEncontrados++;

                        if (paresEncontrados === 4) {
                            alert('Você ganhou! Todas as cartas foram encontradas em ' + tentativas + ' tentativas.');
                        }
                    } else {
                        setTimeout(function() {
                            carta1.classList.remove('virada');
                            carta2.classList.remove('virada');

                            var imagens1 = carta1.getElementsByTagName('img');
                            var imagens2 = carta2.getElementsByTagName('img');

                            for (var i = 0; i < imagens1.length; i++) {
                                imagens1[i].style.display = 'none';
                            }

                            for (var i = 0; i < imagens2.length; i++) {
                                imagens2[i].style.display = 'none';
                            }

                            cartasViradas = [];
                        }, 1000);
                    }
                    tentativas++;
                    document.getElementById('tentativas').textContent = tentativas;
                }
            }
        }

        function reiniciarJogo() {
            var cartas = document.querySelectorAll('.carta');
            for (var i = 0; i < cartas.length; i++) {
                cartas[i].classList.remove('virada');
                var imagens = cartas[i].getElementsByTagName('img');
                for (var j = 0; j < imagens.length; j++) {
                    imagens[j].style.display = 'none';
                }
            }
            cartasViradas = [];
            paresEncontrados = 0;
            tentativas = 0;
            document.getElementById('tentativas').textContent = tentativas;
            shuffleCartas();
        }

        function shuffleCartas() {
            var cartas = document.querySelectorAll('.carta');
            var tabuleiro = document.getElementById('tabuleiro');
            for (var i = cartas.length; i >= 0; i--) {
                tabuleiro.appendChild(cartas[Math.random() * i | 0]);
            }
        }

        var cartas = document.querySelectorAll('.carta');
        for (var i = 0; i < cartas.length; i++) {
            cartas[i].addEventListener('click', function() {
                virarCarta(this.id);
            });
        }

        shuffleCartas();
    </script>

    <?php
    class Carta {
        private $id;
        private $imagem;

        public function __construct($id, $imagem) {
            $this->id = $id;
            $this->imagem = $imagem;
        }

        public function getId() {
            return $this->id;
        }

        public function getImagem() {
            return $this->imagem;
        }
    }

    class JogoMemoria {
        private $cartas = [];

        public function __construct() {
            $imagens = ["imagem1", "imagem2", "imagem3", "imagem4"];
            $this->criarCartas($imagens);
        }

        public function getCartas() {
            return $this->cartas;
        }

        private function criarCartas($imagens) {
            foreach ($imagens as $imagem) {
                $this->cartas[] = new Carta(count($this->cartas) + 1, $imagem);
                $this->cartas[] = new Carta(count($this->cartas) + 1, $imagem);
            }
        }
    }
    ?>
</body>
</html>
