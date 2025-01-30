<?php

    

    if(isset($_POST['patron'])){
        $patron = $_POST['patron'];
        switch($patron){
            case '1':
                header('Location: ./patrons/strategy.php');
                break;
            case '2':
                header('Location: ./patrons/observer.php');
                break;
            
            default:
                echo "Patron no encontrado";
                break;
        } 
        
        exit();  // Importante para evitar que se siga ejecutando el código después de redireccionar.
 
    }
    include 'header.php';
?>
<div id="estructural">

    <div class="container">
        <div class="container-fluid w-50">
            <h1 class="text-center fw-bold">Patrones de comportamiento</h1>
            <p>Los patrones estructurales son técnicas para diseñar estructuras de software. Cada patrón es similar a un diseño que se puede aplicar para diseñar estructuras de software. Los patrones estructurales se describen con mucha formalidad para que se pueda reproducir en muchos contextos.</p>
        </div>
        <div class="container w-75">
            <form action="" method="POST">
                <label for="patrones" class="form-label h4">Patrones de diseño</label>
                <select class="form-select" size="3" aria-label="Size 3 select example" name="patron">
                    <option value="1">Strategy</option>
                    <option value="2">Observer</option>
                    
                </select>
                <button class="btn btn-primary" type="submit">Enviar patron </button>
            </form>
        </div>
    </div>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>