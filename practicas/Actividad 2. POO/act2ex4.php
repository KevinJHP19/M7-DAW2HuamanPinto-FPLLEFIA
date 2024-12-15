<?php


class Personas {
    private string $nombre;
    private int $edad;

    // Constructor para inicializar las propiedades
    public function __construct(string $nombre, int $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    
    public function saludar(): string {
        return "Hola, mi nombre es " . $this->nombre . " y tengo " . $this->edad . " años.";
    }
}

$persona1 = new Personas("Juan", 25);
echo $persona1->saludar();


?>