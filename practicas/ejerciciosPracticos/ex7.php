<?php

class producto{
    public string $nombre;
    public float $precio;

    public function __construct($nombre,$precio){
        $this->nombre=$nombre;
        $this->precio=$precio;
    }
    public function mostrarPrecio(){
        return $this->precio;
    }
}

$leche = new producto("leche",1.45);


echo $leche->mostrarPrecio();

?>