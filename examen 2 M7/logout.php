<?php

 session_start();
if(isset($_GET['verificar'])){
    header('location:index.php');
    session_destroy();
    exit;
}
    
?>