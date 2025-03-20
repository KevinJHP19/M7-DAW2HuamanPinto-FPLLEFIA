<?php
session_start();
require_once '../../config.php';
$uploadDir = __DIR__ . '/../../uploads/projects/';
//2. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //3. Recoger los datos del formulario
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    
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

    //4. Ejecutar la consulta
    $stmt = $mysqli->prepare("INSERT INTO PROJECTS (tittle, url, thumbnail,descripcion) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $title, $url, $avatarPathDB, $description);
    if($stmt->execute()){
        echo "Se ha añadido el proyecto correctamente";
    } else {
        die('Error en la ejecucion: '. $stmt->error);
    }
}
?>
