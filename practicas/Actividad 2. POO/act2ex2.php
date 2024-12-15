<?php

class Coche
{
    //Atributos
    public string $marca;
    public string $modelo;

    //Constructor
    

    //Método para describir el coche
    public function descripcion()
    {
        return "<h1>Mi coche es un " . $this->modelo . " de la marca " . $this->marca . "</h1>";
    }
}


//Instanciar un objeto de la clase Coche y mostrar la descripción del coche.
$micoche = new Coche();
$micoche->marca="Ford";
$micoche->modelo="Mustang";

echo $micoche->descripcion();
