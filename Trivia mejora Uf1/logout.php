<?php

session_start();

    if(isset($_GET['validar'])){
        if($_GET['validar']){
            session_destroy();
        header('location: login.php');
        exit;
        }
        
    }

    ?>