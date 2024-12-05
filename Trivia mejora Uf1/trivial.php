<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['rol'])) {
    if ($_SESSION['username'] == 'player' && $_SESSION['rol'] == 'jugador') {
    }
}
include "data.php";

$preguntas = [
    [
        'id' => 1,
        'question' => '¿Cuál es la capital de Francia?',
        'options' => ['París', 'Londres', 'Berlín'],
        'answer' => 'París'
    ],
    [
        'id' => 2,
        'question' => '¿Cuánto es 2 + 2?',
        'options' => ['3', '4', '5'],
        'answer' => '4'
    ],
    [
        'id' => 3,
        'question' => '¿Cuál es la capital de Italia?',
        'options' => ['Roma', 'Madrid', 'Vienna'],
        'answer' => 'Roma'
    ]
];

$contador = isset($_SESSION['contador']) ? $_SESSION['contador'] : 0;
$mensajedemal = '';

if (isset($_POST['respuesta'])) {
    if ($_POST['respuesta'] == $preguntas[$contador]['answer']) {
        $contador++;
        if ($contador > count($preguntas) - 1) {
            $contador = 0;
        }
        $_SESSION['contador'] = $contador;
        header("location: trivial.php");
    } else {
        $mensajedemal = "Incorrecto, intenta de nuevo";
    }
}

$pregunta = $preguntas[$contador]['question'];
$alternativa1 = $preguntas[$contador]['options'][0];
$alternativa2 = $preguntas[$contador]['options'][1];
$alternativa3 = $preguntas[$contador]['options'][2];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia</title>

</head>

<body>
    <h1>Bienvenido a la trivia</h1>
    <form action="" method="post">
        <h3><?= $pregunta ?></h3>
        <input type="radio" name="respuesta" value="<?php echo $alternativa1; ?>">
        <label for="respuestas"><?= $alternativa1 ?></label>
        <input type="radio" name="respuesta" value="<?php echo $alternativa2; ?>">
        <label for="respuestas"><?= $alternativa2 ?></label>
        <input type="radio" name="respuesta" value="<?php echo $alternativa3; ?>">
        <label for="respuestas"><?= $alternativa3 ?></label>

        <button type="submit" class="btn btn-primary">Verificar</button>
        <?= $mensajedemal ?>
    </form>
</body>

</html>