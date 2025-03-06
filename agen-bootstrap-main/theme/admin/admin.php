<?php
    session_start();
    require_once '../config.php';
    if ($_SESSION['user_rol'] !== 'admin') {
        echo 'No tiene el rol sea administrador';
        exit();
    }
    $testimonials = $mysqli->query("SELECT * FROM TESTIMONIONS");
    $testimonials = $testimonials->fetch_all(MYSQLI_ASSOC);

    $users = $mysqli->query("SELECT * FROM USERS");
    $users = $users->fetch_all(MYSQLI_ASSOC);

    $projects = $mysqli->query("SELECT * FROM PROJECTS");
    $projects = $projects->fetch_all(MYSQLI_ASSOC);

    $news = $mysqli->query("SELECT * FROM NEWS");
    $news = $news->fetch_all(MYSQLI_ASSOC);


    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
    <h1 class="text-center">Panel de admin</h1>
    <h2>Testimonios</h2>
    <table class="table table-bordered">
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Comentario</th>
            <th>Puntuación</th>
        </tr>
        <?php
            foreach ($testimonials as $testimonial) {
                echo '<tr>';
                echo '<td><img src="'.$testimonial['foto'].'" alt="" width=50px height=50px></td>';
                echo '<td>'.$testimonial['name'].'</td>';
                echo '<td>'.$testimonial['subname'].'</td>';
                echo '<td>'.$testimonial['descripcion'].'</td>';
                echo '<td>'.$testimonial['rating'].'</td>';
                echo '<td><a class="btn btn-success href="testimonials/edit-testimonial.php?id='.$testimonial['id'].'">Editar</a></td>';
                echo '<td><a class="btn btn-danger"href="testimonials/delete-testimonial.php?id='.$testimonial['id'].'">Borrar</a></td>';

                echo '</tr>';
            }
        ?>
    </table>
    <a class="btn btn-primary" href="testimonials/add-testimonial.php">Añadir testimonial</a>

    <h2>Usuarios</h2>
    <table class="table table-bordered">
        <tr>
            <th>Avatar</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Rol</th>
            
        </tr>

        <?php
        foreach ($users as $user) {
            echo '<tr>';
            echo '<td><img src="'.$user['avatar'].'" alt="" width=50px height=50px></td>';
            echo '<td>'.$user['name'].'</td>';
            echo '<td>'.$user['subname'].'</td>';
            echo '<td>'.$user['email'].'</td>';
            echo '<td>'.$user['rol'].'</td>';
            echo '<td><a class="btn btn-success href="users/edit-user.php?id='.$user['id'].'">Editar</a></td>';
            echo '<td><a class="btn btn-danger"href="users/delete-user.php?id='.$user['id'].'">Borrar</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <a class="btn btn-primary" href="users/add-user.php">Añadir usuario</a>
    <h2>Proyectos</h2>
    <table class="table table-bordered">
        <tr>
            <th>Titulo</th>
            <th>URL</th>
            <th>Descripcion</th>
            <th>Imagen</th>
        </tr>
        <?php
        foreach ($projects as $project) {
            echo '<tr>';
            echo '<td>'.$project['tittle'].'</td>';
            echo '<td><a class"btn btn-warning" href='.$project['url'].'>Visitar el sito</a></td>';
            echo '<td>'.$project['descripcion'].'</td>';
            echo '<td><a href='.$project['thumbnail'].'><img src="'.$project['thumbnail'].'" alt="" width=80px height=50px></a></td>';
            echo '<td><a class="btn btn-success href="projects/edit-project.php?id='.$project['id'].'">Editar</a></td>';
            echo '<td><a class="btn btn-danger"href="projects/delete-project.php?id='.$project['id'].'">Borrar</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <a class="btn btn-primary" href="projects/add-project.php">Añadir proyecto</a>

    <h2>Noticias</h2>
    <table class="table table-bordered">
        <tr>
            <th>Titulo</th>
            <th>Subtitulo</th>
            <th>Descripcion</th>
            <th>Imagen</th>

        </tr>
        <?php
        foreach ($news as $new) {
            echo '<tr>';
            echo '<td>'.$new['tittle'].'</td>';
            echo '<td>'.$new['descripcion'].'</td>';
            echo '<td>'.$new['subtittle'].'</td>';
            echo '<td><a href='.$new['thumbnail'].'><img src="'.$new['thumbnail'].'" alt="" width=80px height=50px></a></td>';
            echo '<td><a class="btn btn-success href="news/edit-new.php?id='.$new['id'].'">Editar</a></td>';
            echo '<td><a class="btn btn-danger"href="news/delete-new.php?id='.$new['id'].'">Borrar</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <a class="btn btn-primary" href="news/add-new.php">Añadir noticia</a>




    
    </div>    
    
    
    



    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>