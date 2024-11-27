<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('Location: login.php');
    exit;
}
if(isset($_GET['id'])){
    include 'functions.php';
    
    borrarlibro($_GET['id']);
    header('Location: home.php');
    exit;
}



?>