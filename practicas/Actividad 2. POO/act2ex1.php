<?php

class coche
{
    public string $marca = "Ford";

    public string $modelo = "Mustang";


    public function descripcion()
    {
        return "<h1>Mi coche es un " . $this->modelo . " de la marca " . $this->marca . "</h1>";
    }
}

$micoche = new coche();

echo $micoche->descripcion();

?>