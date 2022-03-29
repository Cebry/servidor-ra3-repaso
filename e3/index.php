<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/normalize.css"> -->
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <?php include  '../css.php'; ?>
    <!-- <script src="js/script.js"></script> -->
    <meta name="author" content="Javier Cebrián Muñoz">
    <title>Ejercicio 3 - Operaciones Aritméticas - Javier Cebrián</title>
</head>

<body>
    <!-- <noscript>Esta página funciona con JavaScript, segúrate de tenerlo activado</noscript> -->
    <?php include  '../header.php'; ?>

    <nav>
        <?php include  '../enlaces.php'; ?>
    </nav>
    <main>
        <header>
            <h2>Ejercicio 3 - Operaciones Aritméticas</h2>
        </header>
        <section>
            <?php echo ejercicio(); ?>
        </section>
        <section>
            <div>Escribe un script que muestre al usuario un formulario con una operación aritmética básica generada aleatoriamente. Una vez completado el formulario, el script indicará si la operación se realizó correctamente.</div>
        </section>
    </main>

    <?php include  '../footer.php'; ?>

</body>

</html>

<?php

function ejercicio()
{
    //DONE: inicializacion de variables
    $operaciones = ['+', '-', '·', '/'];
    $operando1 = 0;
    $operando2 = 0;
    $operacion = '';
    $resultado = 0;
    if (isset($_POST['submit'])) {

        //DONE: validar formulario
        $operaciones = ['+', '-', '·', '/'];
        $operando1 = $_POST['operando1'];
        $operando2 = $_POST['operando2'];
        $operacion = $_POST['operacion'];
        $resultado = $_POST['result'];
        if (validarFormulario($operando1, $operacion, $operando2, $operaciones) == true) {
            if ($resultado == calcularesultado($operando1, $operacion, $operando2)) {
                $text = 'Correcto. ¡¡Bien hecho!!';
            } else {
                $text = 'Vaya, qué mal.';
            }
        } else {
            $text = 'Algún dato introducido es erróneo.';
        }

        return '<p>' . $text . '</p>' . '<p><a href="">Repetir</a></p>';
    } else {
        //DONE: generar operacion
        $operando2 = rand(1, 9);
        $operando1 = rand(1, 9);
        $operacion = $operaciones[rand(0, sizeof($operaciones) - 1)];
        //DONE: generar formulario operacion
        include  'basicOperationForm.php';
    }
}

function validarFormulario($operando1, $operacion, $operando2, $operaciones)
{
    if (!in_array($operacion, $operaciones)) {
        return false;
    }
    if (!in_array($operando1, range(1, 9))) {
        return false;
    }
    if (!in_array($operando2, range(1, 9))) {
        return false;
    }
    return true;
}

function calcularesultado($operando1, $operacion, $operando2)
{
    $resultado = 0;
    switch ($operacion) {
        case '+':
            $resultado = $operando1 + $operando2;
            break;

        case '-':
            $resultado = $operando1 - $operando2;
            break;

        case '·':
            $resultado = $operando1 * $operando2;
            break;

        case '/':
            $resultado = $operando1 / $operando2;
            break;
    }
    return floor($resultado);
}
