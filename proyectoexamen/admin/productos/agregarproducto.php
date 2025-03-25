
<?php

session_start();

$uploadDir = __DIR__ . '/../../uploads/articulos/'; // Ruta absoluta

//1. verificar que el rol sea administrador
if ($_SESSION['user_rol'] != 'admin') {
    die('No tiene el rol de administrador');
}

//2. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //3. Recoger los datos del formulario
    $name = $_POST['nombre'];
    $category = $_POST['categoria_id'];
    $price = $_POST['precio'];
    $stock = $_POST['stock'];
    $description = $_POST['descripcion'];

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
                $avatarPathDB = 'uploads/articulos/' . $newFileName;
            } else {
                die('Error al mover el archivo');
            }
        } else {
            die('Formato de archivo no permitido');
        }
    } else {
        die('Error al subir el archivo');
    }

    //4. Insertar en la base de datos
    $stmt = $mysqli->prepare("INSERT INTO productos (nombre,descripcion,num_cantidad,precio,url,categoria_id) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssidsi", $name, $description, $stock, $price, $avatarPathDB, $category);

    if($stmt->execute()){
        echo 'Producto añadido exitosamente';
    } else {
        echo 'Error al añadir el producto';
    }
    $stmt->close();
    $mysqli->close();
    header("Location: vistaproductos.php");
    exit();
}
?>