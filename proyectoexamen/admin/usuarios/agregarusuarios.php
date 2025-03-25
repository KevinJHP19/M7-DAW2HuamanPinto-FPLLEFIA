<?php


require_once '../../config.php'; // Conexión a la BD


$uploadDir = __DIR__ . '/../../uploads/avatars/'; // Ruta absoluta



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nombre'];
    $subname = $_POST['apellidos'];
    $email = $_POST['correo'];
    $rol = $_POST['rol'];
    $password = $_POST['password'];

    // Manejo del archivo avatar
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $destPath = $uploadDir . $newFileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $avatarPathDB = 'uploads/avatars/' . $newFileName;
            }
        }
    }

    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("INSERT INTO usuarios (nombre, apellidos, correo, password, avatar, rol) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $subname, $email, $passwordHashed, $avatarPathDB, $rol);
    $stmt->execute();
    $stmt->close();
    
    header("Location: ../menuadmin.php?usuario=true");
    exit();
}
?>