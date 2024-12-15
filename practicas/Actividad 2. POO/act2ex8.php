<?php

class Animal {

    public string $name;
    public string $tipo;

    public function __construct( $name, $tipo) {
        $this->name = $name;
        $this->tipo = $tipo;

        
     }
     public function ladra() {
        return "El ". $this->tipo. " ". $this->name. " está ladrando. ";
     }
     public function maulla(){
         return "El ". $this->tipo. " ". $this->name. " está maullando. ";
     } 
     public function comer(){
         return "El ". $this->tipo. " ". $this->name. " está comiendo. ";
     }
     
}

$perro = new Animal("Doby","perro");
echo $perro->ladra();
$gato = new Animal("Tom","gato");

$nutria = new Animal("Marco","loro");
echo $nutria->comer();
echo $gato->maulla();
?>