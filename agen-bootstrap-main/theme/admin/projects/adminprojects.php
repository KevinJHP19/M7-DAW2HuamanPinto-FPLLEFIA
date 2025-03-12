<?php
    session_start();
    require_once '/workspaces/M7-DAW2HuamanPinto-FPLLEFIA/agen-bootstrap-main/theme/config.php';
    if ($_SESSION['user_rol'] !== 'admin') {
        echo 'No tiene el rol sea administrador';
        exit();
    }
    $projects = $mysqli->query("SELECT * FROM PROJECTS");
    $projects = $projects->fetch_all(MYSQLI_ASSOC);

    require_once './add-project.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel admin proyectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="">
        <div class="container text-center">
            <h1>Tabla proyectos</h1>
            <div class="text-center mt-3 mb-3">
                    <a type="button" class="btn btn-outline-success ps-5 pe-5 pt-2 pb-2"  style="width: 50%;" data-bs-toggle="modal" data-bs-target="#exampleModal" >Añadir proyecto</a>
            </div>
            <table class="table table-striped">
        <tr>
            <th>Titulo</th>
            <th>URL</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($projects as $project) {
            echo '<tr>';
            echo '<td>'.$project['tittle'].'</td>';
            echo '<td><a class"btn btn-warning" href='.$project['url'].'>Visitar el sito</a></td>';
            echo '<td>'.$project['descripcion'].'</td>';
            echo '<td><a href='.$project['thumbnail'].'><img src="'.$project['thumbnail'].'" alt="" width=100px height=70px></a></td>';
            echo '<td><a class="btn btn-success" href="edit-project.php?id='.$project['id'].'"><i class="fa-solid fa-pen-to-square"></i></a></td>';
            echo '<td><a class="btn btn-danger" href="delete-project.php?id='.$project['id'].'"><i class="fa-solid fa-trash"></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
            </div>
    </main>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir proyecto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="" method="POST">
      <div class="mb-3">
        <label for="title" class="form-label">Titulo:</label>
        <input type="text" id="title" name="title" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="url" class="form-label">URL:</label>
        <input type="text" id="url" name="url" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descripcion:</label>
        <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Imagen:</label>
        <input type="text" id="thumbnail" name="thumbnail" class="form-control" required>
      </div>
        
        
        <input type="submit" class="btn btn-primary text-center" value="Enviar">
    </form>
      </div>
      
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>