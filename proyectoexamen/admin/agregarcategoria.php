<?php

//1. verificar que el rol sea administrador
if ($_SESSION['user_rol'] != 'admin') {
    die('No tiene el rol de administrador');
}

?>