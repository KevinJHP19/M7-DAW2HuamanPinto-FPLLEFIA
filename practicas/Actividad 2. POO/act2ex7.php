<form action="" method="Post">
    <label for="nombre">Introduce tu nombre:</label>
    <input type="text" name="nombre">
    <label for="edad">Introduce tu edad:</label>
    <input type="number" name="edad">
    <button type="submit">Enviar datos</button>
</form>
<?php

class Personas{
    public string $nombre;
    
    public int $edad;

    public function __construct(string $nombre, int $edad){
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    public function mostrarusuario(){
        return $this->nombre . " " . $this->edad;
    }
}
if(isset($_POST['nombre']) && isset($_POST['edad'])){
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $persona1 = new Personas($nombre, $edad);
    echo $persona1->mostrarUsuario();
}
  
?>