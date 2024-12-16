<?php

class persona {
    public string $nombre="Anna";
    public int $edad =25;

    public function saludar(){
        return "Hola soy " . $this->nombre. " y tengo ". $this->edad. " años.";
    }
}


$persona1 = new persona();


echo $persona1->saludar();





?>