<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frutas favoritas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>


<?php
$frutas =[
                [ "nombre" => "Manzana", "imagen" => "http://www.frutas-hortalizas.com/img/fruites_verdures/presentacio/84.jpg", "seleccionada" => false],
                
                [ "nombre" => "Platano", "imagen" => "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Bananas.jpg/273px-Bananas.jpg", "seleccionada" => false],

                [ "nombre" => " Naranja", "imagen" => "http://www.frutas-hortalizas.com/img/fruites_verdures/presentacio/22.jpg", "seleccionada" => false],

                [ "nombre" => "Fresa", "imagen" => "http://www.frutas-hortalizas.com/img/fruites_verdures/presentacio/95.jpg", "seleccionada" => false],

                [ "nombre" => "Kiwi", "imagen" => "http://www.frutas-hortalizas.com/img/fruites_verdures/presentacio/14.jpg", "seleccionada" => false],
            ];
            

            ?>
    <div class="container mt-5">
        <h1 class="text-center">Selecciona tu fruta favorita</h1>



        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Fruta</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>

            <?php
            if(isset($_GET['nom'] )&&  isset($_GET['seleccion'])){
                $nombredefruta = $_GET['nom'] ;
                $frutas['seleccionada'] = $_GET['seleccion'];
                
                
            }
            if($frutas['seleccionada']) { 
                $imagen = $frutas['imagen'];
                $seleccion='✔️seleccionada';
                }
            
            
           foreach($frutas as $fruta){
            
            if($fruta=["seleccionada"]){
                
                echo   "<tr class='table-success'>";

                 echo "<td>$nombredefruta</td>";
                    echo "<td>$seleccion</td>";
                    echo "<td><a class='btn btn-primary' href=''>Seleccionar</a></td>";
            }else{
                echo   "<tr class='table-danger'>";
                echo "<td>{$fruta=['nombre']}</td>";
                echo "<td>'no seleccionado'</td>";
                echo "<td><a class='btn btn-primary' href=''>Seleccionar</a></td>";

            }
                    
            
            echo "</tr>";
           }
           
        echo "</tbody>";
        echo "</table>";

                function mostrarfrutas(){


                echo "<div class='card mt-4 w-25 shadow-lg'>";
                
                echo "<img src='' class='card-img-top img-fluid' alt='Manzana'>";
            
                echo "<div class='card-body bg-warning'>";
                echo "<h5 class='card-title'>{$_GET['nom']}</h5>";
                echo "<p class='card-text'>¡Esta es tu fruta favorita!</p>";
            echo "</div>";
        echo "</div>";
    };
                mostrarfrutas();
           
?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!-- aqui tienes el emoji de SELECCIONADA ✔️ para copiarlo y usarlo en la práctica -->