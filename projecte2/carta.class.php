<?php
class Carta{
    public $palo;
    public $numero;
    public $indice;
    
    public function __construct($palo, $numero) {
        $this->palo = $palo;
        $this->numero = $numero;
    }
    public function pinta_carta(){
        return "<img src='cartas_uno/". $this->numero . "_" . $this->palo . ".png' 
         alt='" . $this->palo . $this->numero ."'> ";    
    }
    public function pinta_carta_link(){
        return "<a href=index.php?color=" . $this->palo . "&valor=" . $this->numero ."><img src='cartas_uno/". $this->numero . "_" . $this->palo . ".png' 
         alt='" . $this->palo . $this->numero ."'></a>" ;
    }
    public function pinta_carta_girada(){
        return "<img src='cartas_uno/carta_girada.png' alt='Cartagirada'>"; 

    }
}

//Test de la clase Carta


