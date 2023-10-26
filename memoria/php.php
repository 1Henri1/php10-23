<?php 
class Logar{
        private $nome;
        private $senha;

        public function __construct($nome, $senha) {
            $this->nome = $nome;
            $this->senha = $senha;
        }

         public function getNome() {
            return $this->nome;
        }

        public function getSenha() {
            return $this->senha;
        }

    }
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
            $imagens = [ "imagem2", "imagem3", "imagem4", "bang", "banguela"];
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