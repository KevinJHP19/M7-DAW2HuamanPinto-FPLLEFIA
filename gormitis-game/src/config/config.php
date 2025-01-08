<?php
 session_start();


 if(!isset($_SESSION['gormitis'])){
    $_SESSION['gormitis']=[
        [
            
        ]
    ];
    
    }else{
    echo "La session array gormitis existe ";
        var_dump($_SESSION["gormitis"]);
    }


?>