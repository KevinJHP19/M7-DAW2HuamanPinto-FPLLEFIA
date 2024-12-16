<?php

class libro{

    public string $titulo;

    public string $autor;

    public function getAutor($autor){
        return $autor;
        
    }
}

$libro = new libro("Odisea","Homero");

echo $libro->getAutor("Homero");




?>