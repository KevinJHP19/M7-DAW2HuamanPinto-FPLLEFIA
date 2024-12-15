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
     public function saludar(){
        return "Hola, soy un". $this->tipo. " y me llamo ". $this->name. "";
     }
     
}

$perro = new Animal("Doby","perro");
echo $perro->ladra();
$gato = new Animal("Tom","gato");

$loro = new Animal("Marco","loro");
echo $loro->comer();
echo $gato->maulla();

//Saludo
echo $gato->saludar();

?>