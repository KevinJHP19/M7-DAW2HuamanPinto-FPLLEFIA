<?php
class Animal {
public string $nombre;
public string $tipo;
public function __construct(){

    
}
public function describir() {
return "El " . $this->tipo . " " . $this->nombre;
}
}
$animal = new Animal();
if (isset($_POST['nombre']) && isset($_POST['tipo'])) {
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];

$animal->nombre = $nombre;
$animal->tipo = $tipo;
echo $animal->describir();
}
?>
<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre">
    <label for="tipo">Tipo:</label>
    <input type="text" name="tipo">
    <input type="submit" value="Enviar">
</form>