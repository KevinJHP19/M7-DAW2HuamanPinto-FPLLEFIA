<?php
    session_start();
    require_once '../config.php';
    if ($_SESSION['user_rol'] !== 'admin') {
        echo 'No tiene el rol sea administrador';
        exit();
    }
    $testimonials = $mysqli->query("SELECT * FROM TESTIMONIONS");
    $testimonials = $testimonials->fetch_all(MYSQLI_ASSOC);


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de admin</title>
</head>
<body>
    <h1>Panel de admin</h1>
    <h2>Testimonios</h2>
    <table>
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
                echo '<td><a href="testimonials/edit-testimonial.php?id='.$testimonial['id'].'">Editar</a></td>';
                echo '<td><a href="testimonials/delete-testimonial.php?id='.$testimonial['id'].'">Borrar</a></td>';

                echo '</tr>';
            }
        ?>
    </table>
    <a href="testimonials/add-testimonial.php">Añadir testimonial</a>
    
    
    
    
    



    
    
    
</body>
</html>