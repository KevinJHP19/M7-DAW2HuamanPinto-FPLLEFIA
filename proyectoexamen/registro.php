<?php
session_start();
require_once './config.php';
$uploadDir = 'uploads/avatars/';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //recoger datos del formulario
    $nombre = $_POST['name'];
    $apellido = $_POST['subname'];
    $email = $_POST['email'];
    
    $password = $_POST['password'];

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
            //Mover el archivo de la caerpeta temporal a la carpeta uploads
            if(!move_uploaded_file($fileTmpPath, $dest_path)){
                die('Error al mover el archivo');
            };
        }else {
            die('Formato de archivo no permitido');
        }
    } else{
        die('Error al subir el archivo');
    }
    //2. cifrar la paswword con password_hash
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    //3.Prepara la consulta antes de insertar para evitar el sql injection
    $stmt = $mysqli->prepare(
        "INSERT INTO usuarios (nombre, apellidos, correo, password, avatar, rol) 
         VALUES (?, ?, ?, ?, ?, 'usuario')"
        );
    //4. Comprobar que la preparacion tuvo exito
    if(!$stmt){
        die('Error en la preparacion: ' . $mysqli->error);
    }
    //5. Bindear los parametos
    $stmt->bind_param('sssss',$nombre,$apellido,$email,$passwordHashed,$dest_path);
    //6. Ejecutar la consulta
    if($stmt->execute()){
        header('Location:./login.php'); //Redireccionar al login después de registrar correctamente
        
        echo 'Registro exitoso';

    } else {
        die('Error en la ejecucion: '. $stmt->error);
        //7.cerrar la coneccion
    $stmt->close();
    $mysqli->close();
    }
}
    




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styles.css">
    
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
    <div class="container d-flex justify-content-center">
        <div class="form-container p-5">
            <h1 class="text-center">Registro</h1>
            <form action="registro.php" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="subname">Apellido:</label>
                    <input type="text" class="form-control" id="subname" name="subname" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="avatar">Avatar:</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" required>
                    
                </div>
                <div class="form-group mb-3">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary text-center" value="Enviar">
                    <a href="./login.php" class="btn btn-link">Ya tienes una cuenta?</a>
                </div>

            </form>
            </div>
        </div>
    </div>
                
    
</body>
</html>