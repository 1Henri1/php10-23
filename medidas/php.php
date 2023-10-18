<?php 
class ConversorUnidades {
        private $valor;
        private $unidadeEntrada;
        private $unidadeSaida;
        private $fatores = [
            "metro" => ["metro" => 1, "quilometro" => 0.001, "centimetro" => 100, "milimetro" => 1000],
            "quilometro" => ["metro" => 1000, "quilometro" => 1, "centimetro" => 100000, "milimetro" => 1000000],
            "centimetro" => ["metro" => 0.01, "quilometro" => 0.00001, "centimetro" => 1, "milimetro" => 10],
            "milimetro" => ["metro" => 0.001, "quilometro" => 0.000001, "centimetro" => 0.1, "milimetro" => 1],
        ];

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function setUnidadeEntrada($unidadeEntrada) {
            $this->unidadeEntrada = $unidadeEntrada;
        }

        public function setUnidadeSaida($unidadeSaida) {
            $this->unidadeSaida = $unidadeSaida;
        }

        public function converter() {
            return $this->valor * $this->fatores[$this->unidadeEntrada][$this->unidadeSaida];
        }
    }
 ?>
