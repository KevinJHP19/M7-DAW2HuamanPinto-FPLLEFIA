<?php

include 'header.php';

?>

<main>
    <div class="container">
         <div class="container-fluid">
            <div class="container w-75 pt-5">
                <h1 class="text-center fw-bold">Patrones de diseño</h1>
                <p>Los patrones de diseño son tecnicas para resolver problemas en el diseño de sofware. Cada patron es similar a un plano que se puede actualizar para resolver un problema de diseño. </p>
                <p>El patron es un conceptoo general para resolver un problema en particular. Puedes seguir los detalles del patron e implementar una solucion que necaje con las realidades de tu propio programa.
                Los patrones se describe con mucha formalidad para que se pueda reproducir en muchos contextos

                <h4>Clasificacion de patrones</h4>
                <p>Pueden variar segun su complejidad, nivel de detalle y escala de aplicabilidad al sistema en el que se diseña.Los mas basicos y de muy bajo nivel son llamados idioms.Usualmente se utilizan un solo lenguaje de programacion. Los patrones mas universales de mas alto nivel son los patrones de arquitectura.</p>
                <p>Además todos los patrones puede clasificarse por su proposito:</p>
            
            </div>
        </div>
        <div class="container-fluid row d-flex align-items-center ">
            <div class="card col m-3">
            <div class="card-header">
                <img src="./images/patronescreacionales.png" alt="" class="img-thumbnail">
                    
                </div>
                <div class="card-body ">
                    <h4>Patrones esctructurales</h4>
                    <a href="esctructurals.php" class="btn btn-primary">
                        Entrar..
                        
                    </a>
                    
                </div>
    
            </div>
            <div class="card col m-3">
                <div class="card-header">
                <img src="./images/patronesestructurales.png" alt="" class="img-thumbnail">
                </div>
                <div class="card-body ">
                    <h4>Patrones creacionales</h4>
                    <a href="creacion.php" class="btn btn-primary">
                        Entrar..
                        
                    </a>

                </div>
    
            </div>
            <div class="card col m-3">
                <div class="card-header">
                    
                    <img src="./images/patronesdecomportamiento.png" alt="" class="img-thumbnail">
                    
                </div>
                <div class="card-body ">
                    <h4>Patrones comportamiento</h4>
                    <a href="comportament.php" class="btn btn-primary">
                        Entrar..
                        
                    </a>
                </div>
        </div>
    </div>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>