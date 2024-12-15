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

$usuario = new Personas("Juan", 25);
$administrador = new Personas("Pablo", 25);
echo $usuario->saludar();
echo "<br>";
echo $administrador->saludar();