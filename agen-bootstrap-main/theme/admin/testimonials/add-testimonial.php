<?php
session_start();
require_once '../../config.php';
$uploadDir = __DIR__ . '/../../uploads/testimonials/';

//2. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //3. Recoger los datos del formulario
    
    $name = $_POST['name'];
    $subname = $_POST['subname'];
    $descripcion = $_POST['descripcion'];
    $rating = $_POST['rating'];

    // Manejo del archivo
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK){
        $fileTmpPath = $_FILES['foto']['tmp_name'];
        $fileName = $_FILES['foto']['name'];

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
                $avatarPathDB = 'uploads/testimonials/' . $newFileName;
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
    $stmt = $mysqli->prepare("INSERT INTO TESTIMONIONS (foto, name, subname, descripcion, rating) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssssi", $avatarPathDB, $name, $subname, $descripcion, $rating);
    if($stmt->execute()){

        
    } else {
        echo 'Error al añadir el testimonial';
    }
    $stmt->close();
    
}

?>
