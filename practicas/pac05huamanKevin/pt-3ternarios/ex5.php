<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <label for="loagueado">Estas logeado</label>
        <input type="checkbox" name='logueado'>
        <br>
        

        <input type="submit">
    </form>
    <?php
    
    $logueado = isset($_POST['logueado']);

    $verificar = $logueado ? "<img src='https://cdn-icons-png.flaticon.com/512/2907/2907553.png'<p> Usuario</p>" : "<img src='https://t3.ftcdn.net/jpg/06/03/30/74/360_F_603307418_jya3zntHWjXWn3WHn7FOpjFevXwnVP52.jpg' <p>Invitado</p>";  

        echo $verificar;

    ?>
    
</body>
</html>