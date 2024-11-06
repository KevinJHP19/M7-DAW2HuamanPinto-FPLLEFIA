<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Mercadona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid ">
        <div class="container text-center my-5 text-bg-success">
            <h1>Bienvenido a Mercadona</h1>
            <p>Por favor, completa el siguient formulario para continuar tu comprar.
            </p>
        </div>
    

    <div class="container">
        <form action="index.php" method="GET">
            <div class="mb-3">
                <label for="" class="form-label">Nombre: </label>
                <input name="nombre" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Telefono</label>
                <input name="telefono" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label  for="" class="form-label">URL de foto de perfil</label>
                <input name="imagen" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Iniciar sesion</button>
            </div>
                
        </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>