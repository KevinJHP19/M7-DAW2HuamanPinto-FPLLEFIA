<?php

    

    function generarTablaProductos($productos){
        
        echo  "<div class='col-11 ps-5 pe-5'>";
       echo  "<table class='table table-dark'>
                <thead>
                    <tr>";             
                    
                    
                        echo  "<th scope='col'>Producto</th>";
                        echo  "<th scope='col'>Precio</th>";
                        echo  "<th scope='col'>Disponibilidad</th>";

        echo        "</tr>
                </thead>
            <tbody>";

                foreach($productos as $producto){
                        
                    $producto['nombre'] =ucfirst($producto['nombre']) ;
                    $producto['precio'] = number_format($producto['precio'], 2, ',', '.');
                    $producto['Disponibilidad'] = $producto['Disponibilidad']? "En stock" : "Agotado";
                    $estiloFila = $producto['Disponibilidad'] == "En stock" ? "table-success" : "table-danger";
        
        echo "<tr class='{$estiloFila}'>
                <td>{$producto['nombre']}</td>
                <td>{$producto['precio']}</td>
                <td>{$producto['Disponibilidad']}</td>
              </tr>";
    
                    
                };
            
    echo  "</tbody>
        </table>
        </div>";

    };
    
    

    function mostrarInfoContacto($nombre, $telefono, $URLimagen){
              
          echo  "<div class='card' style='width: 18rem;'>
         <div class='card-header'>
                Usuario
        </div>
                <ul class='list-group list-group-flush'>
                    <li class='list-group-item'>Nombre : {$nombre}</li>
                    <li class='list-group-item'>Telefono: {$telefono}</li>
                    <li class='list-group-item'>Foto de perfil: <img src='{$URLimagen}' alt='imagen' style='width: 200px; height=200px' ></li>
                 </ul>
        </div>
        ";
    };
    
    

?>