<?php
    session_name('Prueba-Session');
 session_start();


echo $_SESSION['username'];
echo $_SESSION['age'];

unset($_SESSION['username']);


echo $_SESSION['username'];
echo $_SESSION['age'];

session_destroy();