<?php

class Calculadora{

    public function sumar(int $a, int $b){
        return $a + $b;
    }
    public function restar(int $a, int $b){
        return $a - $b;
    }
    public function multiplicar(int $a, int $b){
        return $a * $b;
    }
    public function dividir(int $a, int $b){
        if($b!=0){
            return $a / $b;
        }else {
            return "Error: División por cero.";
        }
    }
}

$calculadora = new Calculadora();

echo $calculadora->sumar(5,20);
echo "<br>";
echo $calculadora->restar(20,5);
echo "<br>";
echo $calculadora->multiplicar(5,20);
echo "<br>";
echo $calculadora->dividir(20,5);





?>