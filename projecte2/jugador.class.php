<?php
class Jugador {
    public $id;
    public $mano; // Instancia de Baraja

    public function __construct() {
        $this->mano = new Baraja(); // Crear una nueva baraja para la mano del jugador
        $this->mano->conjunto_cartas = []; // Asegurarse de que inicie vacía
    }

    public function agregar_carta($carta): void {
        array_push($this->mano->conjunto_cartas, $carta); // Añadir carta a la baraja de la mano
    }

    public function mostrar_mano() {
        // Mostrar las cartas en la mano
        return $this->mano->conjunto_cartas;
    }
}
?>