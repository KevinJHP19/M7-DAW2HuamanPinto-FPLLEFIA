<?php

session_start();
if(isset($_GET['destruir'])){
    if($_GET['destruir'] == true){
        session_destroy();
        header('location:index.php');
        exit();
        
    }
}else{
    header('location:index.php');
    exit;
}

?>