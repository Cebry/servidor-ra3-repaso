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
    <title>Ejercicio 2 - Reescritura de Contraseñas - Javier Cebrián</title>
</head>

<body>
    <!-- <noscript>Esta página funciona con JavaScript, segúrate de tenerlo activado</noscript> -->
    <?php include  '../header.php'; ?>

    <nav>
        <?php include  '../enlaces.php'; ?>
    </nav>
    <main>
        <header>
            <h2>Ejercicio 2 - Reescritura de Contraseñas</h2>
        </header>
        <section>
            <?php echo ejercicio(); ?>
        </section>
        <section>
            <div>Escribe un script que muestre un formulario con dos inputs de tipo <span class="italic">password</span> y verifique en el servidor que las entradas coinciden.</div>
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
        // DONE: Pedir numero minimo y maximo
        include  'twoPasswordsForm.html';
    }
}

function procesaFormulario()
{
    $password = limpiarDato($_POST['password']);
    $repeatPassword = limpiarDato($_POST['repeatPassword']);

    return $password == $repeatPassword ? 'Son iguales.' : 'Son diferentes.';
}

function limpiarDato($dato)
{
    return htmlspecialchars(stripslashes($dato));
}
