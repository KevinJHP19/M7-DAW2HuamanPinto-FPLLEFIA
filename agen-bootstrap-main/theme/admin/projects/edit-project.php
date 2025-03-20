<?php

session_start();
require_once '../../config.php';
$uploadDir = __DIR__ . '/../../uploads/projects/';

//1. verificar que el rol sea administrador
if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol sea administrador';
    exit();
}
//2. agarramos el id
$id = $_GET['id'];
//3. Ejecutar la consulta
$proyecto = $mysqli->query("SELECT * FROM PROJECTS WHERE id = $id");
$proyecto = $proyecto->fetch_assoc();


//4. Validar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $titulo = $_POST['title'];
    $url = $_POST['url'];
    $descripcion = $_POST['description'];

    // Manejo del archivo
    if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK){
        $fileTmpPath = $_FILES['thumbnail']['tmp_name'];
        $fileName = $_FILES['thumbnail']['name'];

        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if(in_array($fileExtension, $allowedExtensions)){
            $newFileName = md5(time() . $fileName). '.'. $fileExtension;
            $dest_path = $uploadDir . $newFileName;

            // Verificar si la carpeta de destino existe, si no, crearla
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if(move_uploaded_file($fileTmpPath, $dest_path)){
                // Guardar solo la ruta relativa en la base de datos
                $avatarPathDB = 'uploads/projects/' . $newFileName;
            } else {
                die('Error al mover el archivo');
            }
        } else {
            die('Formato de archivo no permitido');
        }
    } else {
        die('Error al subir el archivo');
    }

    //5. Actualizar los datos en la base de datos
    $stmt = $mysqli->prepare("UPDATE PROJECTS SET tittle=?,url=?,thumbnail=?, descripcion=? WHERE id=?");
    $stmt->bind_param("ssssi", $titulo, $url, $avatarPathDB, $descripcion, $id);
    if($stmt->execute()){
        header('Location:./adminprojects.php');  // Redireccionar a la lista de testimonios
        
    } else {
        echo 'Error al actualizar el proyecto';
    }
    $stmt->close();
    $mysqli->close();
    exit();
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit testimonial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <h1 class="mb-4">Editar proyecto</h1>
        <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                <label for="title" class="form-label">Titulo:</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo $proyecto['tittle']?>" required>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL:</label>
                <input type="text" id="url" name="url" class="form-control" value="<?php echo $proyecto['url']?>"required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripcion:</label>
                <textarea name="description" id="description" class="form-control" rows="3" required><?php echo $proyecto['descripcion']?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen:</label>
                <input type="file" id="thumbnail" name="thumbnail" class="form-control" value="<?php echo $proyecto['thumbnail']?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+0I5gybF5b5yD1Fq4u5Kk5tBT5j5" crossorigin="anonymous"></script>
    
    
</body>
</html>