<?php

class Saiyajin {

    
    public $nombre ="Goku";
    public $nivel_pelea = 1000;



    public function Saludar() :string {
        return "Hola, mi nombre es " . $this->nombre;
    }
    public function NiveldePelea(){
        return $this->nombre . " tiene un nivel de pelea de " . $this->nivel_pelea;
    }

}
//Creando un objeto con new clase()

$objeto1 = new Saiyajin();

$vegeta = new Saiyajin(); 
$vegeta->nombre = "Vegeta";
$vegeta->nivel_pelea = 2000;

 var_dump($objeto1);
 var_dump($vegeta);
 echo "<br>";  
 echo $objeto1->Saludar();
 echo "<br>";
 echo $vegeta->NiveldePelea();
?>