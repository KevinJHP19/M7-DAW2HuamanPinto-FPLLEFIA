<?php

    session_start();

    

    function editarLibro($id, $titulo, $autor, $imagen, $descripcion){
        if(isset($_SESSION['libros'][$id])) {
            $_SESSION['libros'][$id] = [
                "id" => $id,
                "titulo" => $titulo, 
                "autor" => $autor, 
                "imagen" => $imagen, 
                "descripcion" => $descripcion];
                
                header('location:home.php');
                exit;
        }

    }
    function añadirLibro($id,$titulo,$autor,$imagen,$descripcion){
        $id = count($_SESSION['libros']);
        $libronuevo = [
            "id" => $id,
            "titulo" => $titulo,
            "autor" => $autor,
            "imagen" => $imagen,
            "descripcion" => $descripcion
        ];
        array_push($_SESSION['libros'],$libronuevo);
        header('location:home.php');
        exit;
    }
    function borrarlibro($id){
        if(isset($_SESSION['libros'][$id])) {
            unset($_SESSION['libros'][$id]);
            
        }
    }
    




?>