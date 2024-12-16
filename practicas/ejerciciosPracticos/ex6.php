<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" placeholder="Ingrese su nombre">
    <label for="edad">Edad:</label>
    <input type="number" name="edad" placeholder="Ingrese su edad">
    <input type="submit" value="Enviar">
</form>
<?php

class persona
{
    public string $nombre = "Anna";
    public int $edad = 25;

    public function saludar()
    {
        return "Hola soy " . $this->nombre . " y tengo " . $this->edad . " años.";
    }
}


$persona1 = new persona();
if (isset($_POST['nombre']) && isset($_POST['edad'])) {
    $persona1->nombre = $_POST['nombre'];
    $persona1->edad = $_POST['edad'];
    echo $persona1->saludar();
}


?>