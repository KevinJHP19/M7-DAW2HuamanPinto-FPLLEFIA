<?php
class Jugador{
    public $mano;
    public $id;
    

    public function agregar_carta($carta): void{
        
        array_push($this->mano,$carta);

    }
    public function eliminar_carta($carta){
        
        $key = array_search($carta, $this->mano);
        if($key != false){
            unset($this->mano[$key]);
        }

        
    }
    public function mostrar_mano(){
        
        foreach($this->mano as $carta){
            return $carta->pinta_carta(). "<br>";
        }

    }
}