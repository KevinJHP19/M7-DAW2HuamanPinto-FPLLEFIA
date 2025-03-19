<?php
session_start();
require_once '../../config.php';
$uploadDir = '../../uploads/avatars';

//1. verificar que el rol sea administrador
if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol sea administrador';
    exit();
}

//2. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //3. Recoger los datos del formulario
    $name = $_POST['name'];
    $subname = $_POST['subname'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    
    if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK){
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];

        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if(in_array($fileExtension, $allowedExtensions)){
            $newFileName = md5(time() . $fileName). '.'. $fileExtension;
            //Ruta final en carpeta uploads
            $dest_path = $uploadDir . $newFileName;
            //Mover el archivo de la carpeta temporal a la carpeta uploads
            if(!move_uploaded_file($fileTmpPath, $dest_path)){
                die('Error al mover el archivo');
            }
        } else {
            die('Formato de archivo no permitido');
        }
    } else {
        die('Error al subir el archivo');
    }

    

    //4. Ejecutar la consulta
    $stmt = $mysqli->prepare("INSERT INTO USERS (name,subname,email,avatar,rol) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $name, $subname, $email, $dest_path, $rol);
    if($stmt->execute()){
        echo 'Usuario añadido exitosamente';
    } else {
        echo 'Error al añadir el usuario';
    }
    $stmt->close();
    
}
?>
