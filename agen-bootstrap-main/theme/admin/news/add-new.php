<?php
session_start();
require_once '../../config.php';
$uploadDir = __DIR__ . '/../../uploads/news/';

//1. verificar que el rol sea administrador
if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol sea administrador';
    exit();
}
//2. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //3. Recoger los datos del formulario
    $Titulo = $_POST['Titulo'];
    $Subtitulo = $_POST['Subtitulo'];
    $Descripcion = $_POST['Descripcion'];
    
    // Manejo del archivo
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
        $fileTmpPath = $_FILES['imagen']['tmp_name'];
        $fileName = $_FILES['imagen']['name'];

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
                $avatarPathDB = 'uploads/news/' . $newFileName;
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
    $stmt = $mysqli->prepare("INSERT INTO NEWS (tittle, subtittle, descripcion, thumbnail) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $Titulo, $Subtitulo, $Descripcion, $avatarPathDB);
    if($stmt->execute()){
        
    } else {
        echo 'Error al añadir la noticia';
    }
    $stmt->close();
    
}
?>

</html>