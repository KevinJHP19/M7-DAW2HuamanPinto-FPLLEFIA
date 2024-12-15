<?php 

class producto{
    public string $nombre;
    public float $precio;
    public function __construct($nombre,$precio){
        $this->nombre=$nombre;
        $this->precio=$precio;
    }

}

$leche = new producto("leche",1.21);
$pan = new producto("pan",0.65);
$Cereal = new producto("Cereal",3.25);

$cafe = new producto("cafe",2.19);
$arroz = new producto("arroz",1.99);
$carne = new producto("carne",6.01);




?>
<table>
    <thead>
        <th>Producto</th>
        <th>Precio</th>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $leche->nombre;?></td>
            <td><?php echo $leche->precio;?></td>
        </tr>
        <tr>
            <td><?php echo $pan->nombre;?></td>
            <td><?php echo $pan->precio;?></td>
        </tr>
        <tr>
            <td><?php echo $Cereal->nombre;?></td>
            <td><?php echo $Cereal->precio;?></td>
        </tr>
        <tr>
            <td><?php echo $cafe->nombre;?></td>
            <td><?php echo $cafe->precio;?></td>
        </tr>
        <tr>
            <td><?php echo $arroz->nombre;?></td>
            <td><?php echo $arroz->precio;?></td>
        </tr>
        <tr>
            <td><?php echo $carne->nombre;?></td>
            <td><?php echo $carne->precio;?></td>
        </tr>

    </tbody>
</table>