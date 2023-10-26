<?php  
class calcula {
    private $valorDaConta;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valorConta = isset($_POST["valor_da_conta"]) ? floatval($_POST["valor_da_conta"]) : 0;
        $porc = isset($_POST["porc"]) ? floatval($_POST["porc"]) : 0;}

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
