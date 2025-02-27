<?php
//destruye la session
    session_start();
    //elimina todas las variables de sesion
    session_destroy();
    header('Location: login.php');
?>