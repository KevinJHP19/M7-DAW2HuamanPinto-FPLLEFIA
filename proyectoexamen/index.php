<?php
 session_start();


 require_once 'config.php';
  if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
  }
  $result = $mysqli->query("SELECT * FROM usuarios WHERE id = $_SESSION[user_id]");
  $user = $result->fetch_assoc();
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina familia Becerra</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
            <div class="container-fluid">
                <a class="navbar-brand ps-3" href="#"><?php echo 'Hola ' . $user['nombre'] . " " . $user['apellidos'] ?> <img src="./<?php echo $user['avatar'] ?>" alt="" class="rounded-5 border-bg-white" width="50px" height="50px">
                    <?php
                    if ($user['rol'] == 'admin') {
                        echo '<a class="btn btn-secondary text-white" href="admin/index.php">Panel Admin</a>';
                    }
                    ?>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarsExample01">
                    <ul class="navbar-nav me-auto mb-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <h1>Productos del textil</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Fecha subida</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Título 1</td>
                            <td>Contenido 1</td>
                            <td>2022-01-01</td>
                            <td><a href="" class="btn btn-success">Editar</a></td>
                            <td><a href="" class="btn btn-danger">Eliminar</a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Título 2</td>
                            <td>Contenido 2</td>
                            <td>2022-01-02</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Título 3</td>
                            <td>Contenido 3</td>
                            <td>2022-01-03</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Título 4</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>