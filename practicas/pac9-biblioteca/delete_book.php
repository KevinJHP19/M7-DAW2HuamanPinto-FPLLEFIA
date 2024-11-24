<?php
session_start();

if(isset($_GET['id'])){
    include 'functions.php';
    
    borrarlibro($_GET['id']);
    header('Location: home.php');
    exit;
}



?>