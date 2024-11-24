<?php
 session_start();
 include 'functions.php';
 echo $_SESSION['username'] . " con el rol: ". $_SESSION['rol'] . "<img src=" . $_SESSION['urlimagen'] ." alt='' width='20px' height='20px'>";
// Verifica si el usuario ha iniciado sesión; si no, redirige a login.php.
    if(!isset($_SESSION['username'] ) && !isset($_SESSION['password'])) {
        header('Location: login.php');
        exit;

    }
    // Obtener la lista de libros desde la sesión
    if(!isset($_SESSION['libros'])){
        $_SESSION['libros'] =  [

        ["id" => 0, "titulo" => "El Quijote de la Mancha", "autor" => "Miguel de Cervantes", "imagen" => "https://m.media-amazon.com/images/I/91CIwR3QU1L._UF1000,1000_QL80_.jpg", "descripcion" => "Una historia de amor y adversidades de dos hombres que se ven obligados a vivir juntos en la isla de Gran"],

        ["id" => 1, "titulo" => "La Divina Comedia", "autor" => "Dante Alighieri", "imagen" => "https://m.media-amazon.com/images/I/71WJbXGxPdL._AC_UF1000,1000_QL80_.jpg", "descripcion" => "La Divina comedia, también conocida simplemente como Comedia, es un poema escrito por Dante Alighieri."],

        ["id" => 2, "titulo" => "El Principito", "autor" => "Antoine de Saint-Exupéry", "imagen" => "https://m.media-amazon.com/images/I/714Hvb52n-L._AC_UF894,1000_QL80_.jpg", "descripcion" => "El principito es una novela corta y la obra más famosa del escritor y aviador francés Antoine de Saint-Exupéry.​"],

        ["id" => 3, "titulo" => "1984", "autor" => "George Orwell", "imagen" => "https://m.media-amazon.com/images/I/61ePJ3qc16L._AC_UF894,1000_QL80_.jpg", "descripcion" => "1984 es una novela política de ficción distópica, escrita por George Orwell entre 1947 y 1948 y publicada el 8 de junio de 1949"],

        ["id" => 4, "titulo" => "Odisea" , "autor" => "Homero", "imagen" => "https://www.planetadelibros.com/usuaris/libros/fotos/374/original/portada_odisea-comic_homero_202310231106.jpg", "descripcion" => "Una novela de ficción que ha llegado a la fama mundial"],

        ["id" => 5, "titulo" => "El señor de los anillos", "autor" => "J.R.R. Tolkien", "imagen" => "https://www.planetadelibros.com/usuaris/libros/thumbs/24fb5128-9aaf-4802-8222-047db4b93ef3/d_295_510/portada_el-senor-de-los-anillos_j-r-r-tolkien_201601252224.webp", "descripcion" => "Ni el más sabio conoce el fin de todos los caminos"],

        ["id" => 6, "titulo" => "Las aventura de Alicia en el pais de las maravillas", "autor" => "Lewis Carroll", "imagen" => "https://m.media-amazon.com/images/I/71KhGb3hQ1L._AC_UF894,1000_QL80_.jpg", "descripcion" => "Alicia estaba ya tan acostumbrada a que todo cuanto le sucediera fuera algo extraordinario que le pareció de lo más soso y estúpido que la vida siguiera por el camino normal"],

        ["id" => 7, "titulo" => "Interestellar", "autor" => "Avi Loeb", "imagen" => "https://m.media-amazon.com/images/I/71unCRRx2ML._AC_UF1000,1000_QL80_.jpg", "descripcion" => "Del aclamado astrofísico de Harvard y autor superventas de Extraterrestrial llega un nuevo libro que expande la mente y explica por qué convertirse en una especie interestelar es imperativo para la supervivencia de la humanidad y detalla un plan de juego sobre cómo podemos establecernos entre las estrellas."]

    ];
    }
// Obtener la lista de libros desde la sesión

$botonagregar = '';
$mensajerol = '';
    if($_SESSION['rol'] == 'admin'){

        $mensajerol = '<p class="text-muted m-0"><i class="fas fa-user-shield text-success"></i> Admin ✏️</p>';

        $botonagregar ="<a href='add_edit_book.php' class='btn btn-outline-success btn-lg'><i class='fas fa-plus-circle me-2'></i>Agregar Nuevo Libro</a>";

    } else if ($_SESSION['rol'] == 'lector'){
        $mensajerol = '<p class="text-muted m-0">Lector 📚</p>';
    }
    
?>

<!DOCTYPE html>
<html lang="es">
 
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Encabezado del usuario -->
    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="<?= $_SESSION['urlimagen']?>" alt="Foto de perfil" class="w-25 rounded-circle me-3">
                <div>
                    <h4 class="m-0">👋 Bienvenido, <?php 
                     echo $mensajerol;
                        ?></h4>
                </div>
            </div>
            <a href="logout.php?salida=true" class="btn btn-warning btn-sm">
                Cerrar sesión ❌
            </a>
        </div>
    </header>

    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Biblioteca Virtual</h1>
            <p class="lead">Disfruta explorando nuestra colección de libros</p>
        </div>
        <!-- Botón de agregar libro (solo visible para el admin) -->
        <div class="text-center mb-4">
            <?php echo $botonagregar;?>
        </div>
        <!-- Mostrar lista de libros en un grid de tarjetas con tamaño uniforme -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 center">
            
                <?php 
                foreach ($_SESSION['libros'] as $_SESSION['libro']) {
                    
                    echo "<div class='col-3 mb-4'>";
                    echo "<div class='card h-100 '>";
                    echo "<img src='". $_SESSION['libro']['imagen']. "' alt='". $_SESSION['libro']['titulo']. "' class='card-img-top mb-2' style='height: 550px; object-fit: cover;'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>". $_SESSION['libro']['titulo']. "</h5>";
                    echo "<p class='card-text'><strong>Autor:</strong> ". $_SESSION['libro']['autor']. "</p>";
                    echo "<p class='card-text'>Descripcion: ". $_SESSION['libro']['descripcion']. "</p>";
                    echo "</div>";
                    if($_SESSION['rol'] == 'admin'){
                    echo "<div class='card-footer d-flex justify-content-between'>";
                    
                        echo "<a href='delete_book.php?id=".$_SESSION['libro']['id']."' class='btn btn-outline-danger btn-sm'><i class='fas fa-trash-alt'></i> Eliminar</a>";
                        echo "<a href='add_edit_book.php?id=".$_SESSION['libro']['id']."' class='btn btn-outline-primary btn-sm'><i class='fas fa-edit'></i> Editar</a>";
                    
                    
                    echo "</div>";
                    };
                    echo"</div>
                    </div>";


                };
                ?>

                
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>