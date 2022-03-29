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
    <title>Ejercicio 1 - Número Aleatorio - Javier Cebrián</title>
</head>

<body>
    <!-- <noscript>Esta página funciona con JavaScript, segúrate de tenerlo activado</noscript> -->
    <?php include  '../header.php'; ?>

    <nav>
        <?php include  '../enlaces.php'; ?>
    </nav>
    <main>
        <header>
            <h2>Ejercicio 1 - Número Aleatorio</h2>
        </header>
        <section>
            <?php echo ejercicio(); ?>
        </section>
        <section>
            <div>Escribe un script que muestre al usuario un número comprendido entre dos números que han sido solicitados previamente mediante un formulario.
            </div>
        </section>
    </main>

    <?php include  '../footer.php'; ?>

</body>

</html>

<?php
function ejercicio()
{
    if (isset($_POST['submit'])) {
        echo '<p>' . procesaFormulario() . '</p>';
        echo '<p><a href="">Repeat</a></p>';
    } else {
        // TODO: Pedir numero minimo y maximo
        include  'minMaxForm.html';
    }
}

function procesaFormulario()
{
    $min = floor($_POST['min']);
    $max = floor($_POST['max']);
    if ($min <= $max) {
        //TODO: mostrar número aleatorio entre el minimo y el máximo
        return floor(rand($min, $max));
    } else {
        return "Minimun number must be lower than maximun number.";
    }
}
