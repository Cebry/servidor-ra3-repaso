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
    <title>Ejercicio 5 - Figuras Geométricas - Javier Cebrián</title>
</head>

<body>
    <!-- <noscript>Esta página funciona con JavaScript, segúrate de tenerlo activado</noscript> -->
    <?php include  '../header.php'; ?>

    <nav>
        <?php include  '../enlaces.php'; ?>
    </nav>
    <main>
        <header>
            <h2>Ejercicio 5 - Figuras Geométricas</h2>
        </header>
        <section>
            <?php
            echo ejercicio();
            ?>
        </section>
        <section>
            <div>Escribe un script que muestre una figura geométrica utilizando el formato <span class="italic">svg</span>. Para ello el script mostrará un formulario con un radio button con las figuras disponibles: círculo, rectángulo, cuadrado y un cuadro de texto para seleccionar el color. En función de la figura elegida, el script solicitará lso datos necesarios para su visualización.</div>
        </section>
    </main>

    <?php include  '../footer.php'; ?>

</body>

</html>

<?php
function ejercicio()
{
    $formas = ['circle', 'square', 'rectangle'];
    // DONE: inicializar variables
    $forma = $formas[0];
    $lado = 0;
    $ancho = 0;
    $alto = 0;
    $radio = 0;
    $color = '#000';

    if (isset($_POST['submit'])) {
        $forma = limpiarDato($_POST['forma']);
        if (!in_array($forma, $formas)) {
            return "Ooops, forma equivocada.";
        }
        //DONE: validar formulario que pide dimensiones y color
        if ($_POST['submit'] == 'dimensiones') {
            $color = limpiarDato($_POST['color']);

            switch ($forma) {
                case 'circle':
                    $radio = limpiarDato($_POST['radio']);
                    if (!in_array($radio, range(1, 400))) {
                        $msg = "Ooops, radio equivocado.";
                    }
                    //DONE: dibujo
                    $msg = drawCircle($radio, $color);
                    break;
                case 'square':
                    $lado = limpiarDato($_POST['lado']);
                    if (!in_array($lado, range(1, 400))) {
                        $msg = "Ooops, lado equivocado.";
                    }
                    //DONE: dibujo
                    $msg = drawSquare($lado, $color);
                    break;
                case 'rectangle':
                    $alto = limpiarDato($_POST['alto']);
                    if (!in_array($alto, range(1, 400))) {
                        $msg = "Ooops, alto equivocado.";
                    }
                    $ancho = limpiarDato($_POST['ancho']);
                    if (!in_array($ancho, range(1, 400))) {
                        $msg = "Ooops, ancho equivocado.";
                    }
                    //DONE: dibujo
                    $msg = drawRectangle($ancho, $alto, $color);
                    break;
            }
            return $msg . '<p><a href="">Repetir</a></p>';
        }

        if ($_POST['submit'] == 'forma') {
            //DONE: formulario que pide dimensiones y color
            $forma = $_POST['forma'];
            include  'formularioDimensiones.php';
        }
    } else {
        //DONE: formulario que pide forma
        include  'formularioForma.php';
    }
}

function drawRectangle($width, $heigth, $color = '#6320eeff')
{
    return '
    <svg
        width="' . $width . '"
        height="' . $heigth . '">
        <rect
            width="' . $width . '"
            height="' . $heigth . '"
            style="fill:' . $color . ';"
        />
    </svg>';
}

function drawCircle($radius, $color = '#6320eeff')
{
    return '
    <svg 
        height="' . $radius * 2 . '"
        width="' . $radius * 2  . '">
            <circle
                cx="' . $radius . '"
                cy="' . $radius . '"
                r="' . $radius . '"
                fill="' . $color . '" 
            />
    </svg> ';
}

function drawSquare($length, $color = '#6320eeff')
{
    return  drawRectangle($length, $length, $color);
}
function limpiarDato($dato)
{
    return htmlspecialchars(stripslashes($dato));
}
