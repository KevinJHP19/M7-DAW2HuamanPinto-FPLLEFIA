<?php

session_start();
require_once '../../config.php';
$uploadDir = __DIR__ . '/../../uploads/avatars/';

//1. verificar que el rol sea administrador
if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol sea administrador';
    exit();
}
//2. agarramos el id
$id = $_GET['id'];
//3. Ejecutar la consulta
$usuario = $mysqli->query("SELECT * FROM usuarios WHERE id = $id");
$usuario = $usuario->fetch_assoc();


//4. Validar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $email = $_POST['correo'];
    $name = $_POST['nombre'];
    $subname = $_POST['apellidos'];
    $password = $_POST['password'];

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
    
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    //5. Actualizar los datos en la base de datos
    $stmt = $mysqli->prepare("UPDATE usuarios SET nombre=?,apellidos=?, correo=?, avatar=?, password=?,rol=? WHERE id=?");
    $stmt->bind_param("ssssssi",  $name, $subname, $email, $avatarPathDB,$passwordHashed, $rol, $id);
    if($stmt->execute()){
        header('Location: ../menuadmin.php?usuario=true');
    } else {
        echo 'Error al actualizar el usuario';
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
    <title>Edit Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <h1 class="mb-4">Editar Usuario</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="nombre" value="<?php echo $usuario['nombre']?>" required>
            </div>
            <div class="mb-3">
                <label for="subname" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="subname" name="apellidos" value="<?php echo $usuario['apellidos']?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="correo"value="<?php echo $usuario['correo']?>" required>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar" value="<?php echo $usuario['avatar']?>" >
                <?php if (!empty($usuario['avatar'])): ?>
        <img src="../../<?php echo $usuario['avatar']; ?>" alt="Avatar actual" width="100px" height="100px" class="mt-2">
    <?php endif; ?>
            </div>
            
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
               
                <select class="form-select" id="rol" name="rol" required>
                  <option value="">Seleccione un rol</option>
                  <option value="admin">Administrador</option>
                  <option value="trabajador">Trabajador</option>
                  <option value="usuario">Usuario</option>
                </select>

                
            </div>
            <div class="mb-3">
              <label for="pasword" class="form-label">Contraseña:</label>
              <input type="password" class="form-control" id="pasword" name="password" value="<?php echo $usuario['password']?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+0I5gybF5b5yD1Fq4u5Kk5tBT5j5" crossorigin="anonymous"></script>
    
    
</body>
</html>
