<?php
 session_start();
if(isset($_GET['salida'])){
    header('location:login.php');
    
    
    session_destroy();
    exit;
}
?>