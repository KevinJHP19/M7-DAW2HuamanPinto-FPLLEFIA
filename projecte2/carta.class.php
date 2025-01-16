<?php
class Carta{
    public $palo;
    public $numero;
    public $indice;
    
    
    public function pinta_carta(){
        return "<img src='cartas_uno/". $this->numero . "_" . $this->palo . ".png' 
         alt='" . $this->palo . $this->numero ."'";    
    }
    public function pinta_carta_link(){
        return "<a href='index.php?color=" . $this->palo . "&valor=" . $this->numero;
    }
    public function pinta_carta_girada(){

    }
}
    

?>