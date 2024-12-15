<?php

class libro
{
    public $titulo = "Odisea";

    public $autor = "Homero";
    
    public function __construct($titulo, $autor){
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    public function descripcion()
    {
        return "El libro se llama " . $this->titulo . " y es escrito por " . $this->autor;
    }
}

$libro = new libro("Odisea", "Homero");



?>