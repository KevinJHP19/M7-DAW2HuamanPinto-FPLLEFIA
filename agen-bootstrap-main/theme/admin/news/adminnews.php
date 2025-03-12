<?php
    session_start();
    require_once '/workspaces/M7-DAW2HuamanPinto-FPLLEFIA/agen-bootstrap-main/theme/config.php';
    if ($_SESSION['user_rol'] !== 'admin') {
        echo 'No tiene el rol sea administrador';
        exit();
    }
    $news = $mysqli->query("SELECT * FROM NEWS");
    $news = $news->fetch_all(MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="">
        <div class="container text-center">
            <h1>Tabla noticias</h1>
            <div class="row">
            <div class="col-8 h-100">
            <table class="table table-striped">
                <tr>
                    <th>Titulo</th>
                    <th>Subtitulo</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Fecha de publicacion</th>
                    <th></th>
                    <th></th>
                    

                </tr>
                <?php
                foreach ($news as $new) {
                    echo '<tr>';
                    echo '<td>'.$new['tittle'].'</td>';
                    echo '<td>'.$new['descripcion'].'</td>';
                    echo '<td>'.$new['subtittle'].'</td>';
                    echo '<td><a href='.$new['thumbnail'].'><img src="'.$new['thumbnail'].'" alt="" width=80px height=50px></a></td>';
                    echo '<td>'.$new['data_publicacio'].'</td>';
                    echo '<td><a class="btn btn-success" href="./edit-new.php?id='.$new['id'].'"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                    echo '<td><a class="btn btn-danger"href="./delete-new.php?id='.$new['id'].'"><i class="fa-solid fa-trash"></i></a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
            </div>
                <div class="col-4 align-items-center text-center">
                    <a class="btn btn-primary" href="./add-new.php">Añadir noticia</a>
                </div>
                
            </div>
        </div>
            
    
        
        

    </main>
    
</body>
</html>