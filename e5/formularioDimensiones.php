<form action="" method="POST">
    <label for="">Dimensiones</label>
    <input type="hidden" name="forma" value="<?php echo $forma; ?>">
    <div>
        <label for="color">color</label>
        <input name="color" id="color" value="#6320eeff" required>
    </div>
    <?php
    $dimensiones = [];
    switch ($forma) {
        case 'circle':
            array_push($dimensiones, 'radio');
            break;
        case 'square':
            array_push($dimensiones, 'lado');
            break;
        case 'rectangle':
            array_push($dimensiones, 'ancho', 'alto');
            break;
    }

    foreach ($dimensiones as $dimension) {
        include  'inputDimension.php';
    } ?>
    <button type="submit" name="submit" value="dimensiones">Dibujar</button>
</form>
<p><a href="">Elegir otra forma</a></p>