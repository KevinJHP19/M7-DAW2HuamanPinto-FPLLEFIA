<?php

class Gormiti{

    public $id;
    public $nombre;
    public $salud;
    public $dany;
    public $imagen;
    public $habilidad;
    public function __construct($id,$nombre,$salud,$dany,$imagen,$habilidad){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->salud = $salud;
        $this->dany = $dany;
        $this->imagen = $imagen;
        $this->habilidad = $habilidad;
    }
    public function obtenedeHabilidad(){
        
    }
}

?>