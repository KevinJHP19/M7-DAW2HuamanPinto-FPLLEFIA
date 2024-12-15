<?php

class libro
{
    public $titulo;

    public $autor;

    public function descripcion()
    {
        return "El libro se llama " . $this->titulo . " y es escrito por " . $this->autor;
    }
}

$libro1 = new libro();
$libro1->$titulo="Odisea";
$libro1->$autor="Homero";

echo $libro1->descripcion();
?>