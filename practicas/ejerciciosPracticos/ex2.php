<?php

class libro
{
    public string $titulo = "Odisea";

    public string $autor = "Homero";

    public function descripcion() :string
    {
        return "El libro se llama " . $this->titulo . " y es escrito por " . $this->autor;
    }
}

$libro1 = new libro("Odisea","Homero");

echo $libro1->descripcion();
?>