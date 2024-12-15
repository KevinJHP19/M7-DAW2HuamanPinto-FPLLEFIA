<?php

class Calculadora{

    public function Suma(int $a, int $b): int{
        return $a + $b;    
    
    }
}

$calculadora = new Calculadora();

echo $calculadora->Suma(5,20);

?>