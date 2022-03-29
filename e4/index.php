<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/normalize.css"> -->
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <?php include '../css.php'; ?>
    <!-- <script src="js/script.js"></script> -->
    <meta name="author" content="Javier Cebrián Muñoz">
    <title>Ejercicio 4 - Encuesta - Javier Cebrián</title>
</head>

<body>
    <!-- <noscript>Esta página funciona con JavaScript, segúrate de tenerlo activado</noscript> -->
    <?php include '../header.php'; ?>

    <nav>
        <?php include '../enlaces.php'; ?>
    </nav>
    <main>
        <header>
            <h2>Ejercicio 4 - Encuesta</h2>
        </header>
        <section>
            <?php echo ejercicio(); ?>
        </section>
        <section>
            <div>Escribe un script que muestre un formulario que permita la votación de 10 items (item1, item2, ...) mediante un radio button de 1 a 5. La respuesta al formulario mostrará el item mejor valorado.</div>
        </section>
    </main>

    <?php include '../footer.php'; ?>

</body>

</html>

<?php



function ejercicio()
{
    $items = ['item 1', 'item 2', 'item 3', 'item 4', 'item 5', 'item 6', 'item 7', 'item 8', 'item 9', 'item 10',];
    $valoraciones = range(1, 5);
    if (isset($_POST['submit'])) {

        echo '<ul>';
        foreach (procesaFormulario($items, $valoraciones) as $item) {
            echo '<li>' . $item . '</li>';
        }
        echo '</ul>';
        echo '<p><a href="">Repetir</a></p>';
    } else {
        // DONE: Mostrar formulario

        include 'valorationForm.php';
    }
}

function procesaFormulario($items, $valoraciones)
{

    // DONE: inicializar vector de frecuencias
    foreach ($valoraciones as $valoracion) {
        $vectorFrecuencias[$valoracion] = 0;
    }

    // DONE: rellenar vector de frecuencias
    foreach ($items as $item) {
        $vectorFrecuencias[$_POST[str_replace(' ', '_', $item)]]++;
    }

    // DONE: calcular frecuencia mayor
    //mayor valor, no mayor frecuencia!!!!!!!
    $mayorValor = 0;
    foreach ($vectorFrecuencias as $valoracion => $frecuencia) {
        if ($mayorValor < intval($valoracion) && $frecuencia != 0) $mayorValor = $valoracion;
    }

    // DONE: mostrar items con mayor frecuencia
    $itemsSeleccionados = [];
    foreach ($items as $item) {
        if ($_POST[str_replace(' ', '_', $item)] == $mayorValor) {
            array_push($itemsSeleccionados, $item);
        }
    }

    return $itemsSeleccionados;
}
