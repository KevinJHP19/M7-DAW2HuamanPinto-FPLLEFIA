<?php
 include '../header.php';
?>
<link rel="stylesheet" href="../estilos.css">
<style>
    .cm-mensaje{
    color: green;
}
.cm-metodo{
    color: blue;
}
.cm-clase{
    color: blueviolet;
}
.cm-php{
    color: red;
}
.cm-variable{
    color: orange;
}
</style>
<main> 
<div class="container-fluid text-center m-3 ">
    <div class="container">
        <h1>Adapter</h1>
        <div class="container text-start ps-5" mb-3>
            <p>El adapter es un patrón estructural que facilita la colaboracion a objetos incompatibles. Actua como envoltorio entre dos objetos, atrapa las llamadas a un objeto y las transforma a una formato y una interfaz compatible para el segun objeto.</p>
            <p>Se utiliza muy amenudo en sistemas basados en algun codigo heredado, es muy reconocido por un constructor que toma una instancias de un distinto tipo de clase abstracta, cuando el adaptador recibe una llamada de un mentodo, convierte los parametros al formato adecuado que despues dirige la llamada a uno o varios metodos del objeto envuelto.</p>
            <div class="card text-center m-5" >
                <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="text-center">Ventajas</h5>
                    </div>
                    <div class="col">
                        <h5 class="text-center">Desventajas</h5>
                    </div>
                </div>
                </div>
                
                <div class="card-body ">
                    <div class="row">
                        <div class="col">
                            <ul class="text-start">
                                <li>Puedes separar la interfaz o el código de conversión de datos de la lógica de negocio primaria del programa.</li>
                                <li>Puedes separar la interfaz o el código de conversión de datos de la lógica de negocio primaria del programa.</li>
                                
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="text-start">
                                <li>Puede haber una pequeña penalización en el rendimiento debido a la sobrecarga de llamadas adicionales al adaptar una interfaz.</li>
                                <li>Si la interfaz del objeto original cambia, es posible que debas modificar también el adaptador, lo que puede hacer que el mantenimiento sea más difícil.</li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                    
                </div>
            
            <div class="text-center">
                <img src="../images/adapter1.png" alt="" class="img-fluid">
            </div>

            
        </div>
        <div  class="ejemplo text-start bg-secondary-subtle p-5">
            <h4>Ejemplo:</h4>
            <span class="cm-php">< ?php</span>
            <br>
            <span class="cm-comment">//Adaptador que hace compatible la nueva libreria</span>
            <br>
            <span class="cm-clase">class</span>
            <span class="cm-nomclase">NewLoggweAdapter</span>{
                <br>
                <br>
            <span class="cm-clase">private</span> <span class="cm-variable">$newLogger</span>;
            <br>
            <span class="cm-clase">public function</span> <span class="cm-metodo">__construct</span>(NewLoggerLibrary <span class="cm-variable">$newLogger</span>){
                <br>
            <span class="cm-clase">public function</span> <span class="cm-metodo">logMessage</span>( <span class="cm-variable">$mensaje</span> ) { 
                <br>
                <span class="cm-variable">$this</span>->newLogger-> <span class="cm-metodo">writeLog(</span><span class="cm-variable">$mensaje</span>);
                <br>

            }  
            <br>
        }
        <br>
        <span class="cm-mensaje">// Uso del adaptador en el sistema</span>
        <br>
        <span class="cm-variable">$nuevoLogger</span>= <span class="cm-clase">new</span> <span class="cm-metodo">NewLoggerLibrary</span>();
        <br>
        <span class="cm-variable">$logger</span><span class="cm-clase">new</span><span class="cm-metodo">NewLoggerAdapter</span>(<span class="cm-variable">$nuevoLogger</span> );
        <br>
        <span class="cm-variable">$logger</span>-> <span class="cm-metodo">logMessage</span>( <span class="cm-mensaje">"Este es un mensaje de prueba"</span> ); 
    }   
        </div>
    </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>