<?php
    $uploadDir = __DIR__ . '/../../uploads/avatars/';

//2. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //3. Recoger los datos del formulario
    
    $name = $_POST['name'];
    $subname = $_POST['subname'];
    $descripcion = $_POST['descripcion'];
    $rating = $_POST['rating'];

    // Manejo del archivo
    if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK){
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];

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
                $avatarPathDB = 'uploads/avatars/' . $newFileName;
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
    $stmt->bind_param("ssssi", $foto, $name, $subname, $descripcion, $rating);
    if($stmt->execute()){

        
    } else {
        echo 'Error al añadir el testimonial';
    }
    $stmt->close();
    
}

?>
