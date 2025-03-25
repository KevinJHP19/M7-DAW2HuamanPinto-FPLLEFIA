<?php
require_once './config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto_id = intval($_POST['producto_id']);
    $accion = $_POST['accion'];

    if ($accion === 'aumentar') {
        $stmt = $mysqli->prepare("UPDATE productos SET num_cantidad = num_cantidad + 1 WHERE id = ?");
    } elseif ($accion === 'disminuir') {
        $stmt = $mysqli->prepare("UPDATE productos SET num_cantidad = num_cantidad - 1 WHERE id = ? AND num_cantidad > 0");
    }

    if ($stmt) {
        $stmt->bind_param("i", $producto_id);
        $stmt->execute();
        $stmt->close();
    }

    header('Location: paneltrabajador.php');
    exit();
}
?>