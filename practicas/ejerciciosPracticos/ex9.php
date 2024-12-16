<?php

 class producto{
    public string $nombre;
    public float $precio;

    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
 }

 $leche = new Producto("leche", 1.21);
 $carne = new Producto("carne", 4.59);
 $pan = new Producto("pan", 0.65);
 $cereal = new Producto("cereal", 3.25);
 $cafe = new Producto("cafe", 2.19);
 $arroz = new Producto("arroz", 1.99);
 $manzana = new Producto("manzana", 0.50);
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
            <td><?php echo $carne->nombre;?></td>
            <td><?php echo $carne->precio;?></td>
        </tr>
        <tr>
            <td><?php echo $pan->nombre;?></td>
            <td><?php echo $pan->precio;?></td>
        </tr>
        <tr>
            <td><?php echo $cereal->nombre;?></td>
            <td><?php echo $cereal->precio;?></td>
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
            <td><?php echo $manzana->nombre;?></td>
            <td><?php echo $manzana->precio;?></td>
        </tr>
    </tbody>
</table>

