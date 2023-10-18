<?php  
class calcula {
    private $valorDaConta;

    public function setValorDaConta($valor) {
        
            $this->valorDaConta = $valor;
         
    }

    public function getValorDaConta() {
        return $this->valorDaConta;
    }

    public function calcularGorjeta($percentual) {
        
            return $this->valorDaConta * ($percentual / 100);
         
    }
}

?>
