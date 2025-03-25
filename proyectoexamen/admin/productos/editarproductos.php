<?php
session_start();
require_once '../../config.php';
$uploadDir = __DIR__ . '/../../uploads/articulos/';

//1. verificar que el rol sea administrador
if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol sea administrador';
    exit();
}

//2. agarramos el id
$id = $_GET['id'];

//3. Ejecutar la consulta para obtener los datos del producto
$stmt = $mysqli->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die('Producto no encontrado.');
}

$producto = $result->fetch_assoc();
$stmt->close();

$categorias = $mysqli->query("SELECT * FROM categorias");
$categorias = $categorias->fetch_all(MYSQLI_ASSOC);

//4. Validar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nombre'];
    $description = $_POST['descripcion'];
    $price = $_POST['precio'];
    $stock = $_POST['stock'];
    $category = $_POST['categoria_id'];
    $avatarPathDB = $producto['url'];

    // Manejo del archivo
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
                $avatarPathDB = 'uploads/articulos/' . $newFileName;
            } else {
                die('Error al mover el archivo');
            }
        } else {
            die('Formato de archivo no permitido');
        }
    }

    //5. Actualizar los datos en la base de datos
    $stmt = $mysqli->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, num_cantidad=?, url=?, categoria_id=? WHERE id=?");
    $stmt->bind_param("ssdisii", $name, $description, $price, $stock, $avatarPathDB, $category, $id);
    if($stmt->execute()){
        header('Location: ../menuadmin.php?producto=true');
    } else {
        echo 'Error al actualizar el producto';
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
    <title>Editar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Editar Producto</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $producto['num_cantidad']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="img" name="avatar">
            <img src="../../<?php echo $producto['url']; ?>" alt="<?php echo $producto['nombre']; ?>" width="100" height="100">
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <?php foreach ($categorias as $categoria) : ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="categoria_id" id="cat_<?php echo $categoria['id']; ?>" 
                        value="<?php echo $categoria['id']; ?>" <?php echo ($producto['categoria_id'] == $categoria['id']) ? 'checked' : ''; ?> required>
                    <label class="form-check-label" for="cat_<?php echo $categoria['id']; ?>">
                        <i class="<?php echo $categoria['icono']; ?>"></i> <?php echo $categoria['nombre']; ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>