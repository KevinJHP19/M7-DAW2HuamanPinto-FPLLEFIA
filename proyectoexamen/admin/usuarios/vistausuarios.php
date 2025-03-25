<?php
session_start();
require_once '../config.php'; // Asegurar conexión a la BD

if ($_SESSION['user_rol'] !== 'admin') {
    header('Location: ../../index.php');
    exit();
}

$buscar = isset($_POST['buscar']) ? trim($_POST['buscar']) : '';

// Consulta con búsqueda segura
if (!empty($buscar)) {
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE nombre LIKE ? OR apellidos LIKE ? OR correo LIKE ?");
    if ($stmt) {
        $likeBuscar = "%$buscar%";
        $stmt->bind_param("sss", $likeBuscar, $likeBuscar, $likeBuscar);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuarios = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    } else {
        die("Error en la consulta: " . $mysqli->error);
    }
} else {
    $result = $mysqli->query("SELECT * FROM usuarios");
    $usuarios = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
    <style>
        /* Ocultar tabla en pantallas pequeñas */
        @media (max-width: 768px) {
            .table-responsive {
                display: none;
            }
            .card-container {
                display: block;
            }
        }

        /* Ocultar tarjetas en pantallas grandes */
        @media (min-width: 769px) {
            .card-container {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Lista de Usuarios</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Agregar Usuario
    </button>
    
    <!-- Formulario de búsqueda -->
    <form action="" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar usuario..." name="buscar" value="<?php echo htmlspecialchars($buscar); ?>">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    <!-- Tabla de usuarios -->
    <?php if (!empty($usuarios)): ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Avatar</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><img src="../<?php echo $usuario['avatar']; ?>" alt="Avatar" width="50" height="50"></td>
                            <td><?php echo $usuario['nombre']; ?></td>
                            <td><?php echo $usuario['apellidos']; ?></td>
                            <td><?php echo $usuario['correo']; ?></td>
                            <td><?php echo $usuario['rol']; ?></td>
                            <td>
                                <a class="btn btn-warning me-3 mb-3" href="./usuarios/editarusuarios.php?id=<?php echo $usuario['id']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a class="btn btn-danger mb-3" href="./usuarios/eliminarusuarios.php?id=<?php echo $usuario['id']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Tarjetas de usuarios -->
        <div class="card-container">
            <?php foreach ($usuarios as $usuario) : ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <img src="../<?php echo $usuario['avatar']; ?>" alt="Avatar" width="50" height="50" class="me-3">
                            <div>
                                <h5 class="card-title mb-0"><?php echo $usuario['nombre']; ?></h5>
                                <p class="card-text"><?php echo $usuario['apellidos']; ?></p>
                            </div>
                        </div>
                        <p class="card-text"><strong>Email:</strong> <?php echo $usuario['correo']; ?></p>
                        <p class="card-text"><strong>Rol:</strong> <?php echo $usuario['rol']; ?></p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-warning me-3" href="./usuarios/editarusuarios.php?id=<?php echo $usuario['id']; ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a class="btn btn-danger" href="./usuarios/eliminarusuarios.php?id=<?php echo $usuario['id']; ?>">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="alert alert-warning">No se encontraron resultados para "<?php echo htmlspecialchars($buscar); ?>"</p>
    <?php endif; ?>
</div>

<!-- Modal para agregar usuario -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./usuarios/agregarusuarios.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Email</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-control" id="rol" name="rol" required>
                            <option value="admin">Admin</option>
                            <option value="usuario">Usuario</option>
                            <option value="trabajador">Trabajador</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
