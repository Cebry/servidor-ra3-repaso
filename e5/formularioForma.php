<form action="" method="POST">
    <label for="">Shape</label>
    <?php foreach ($formas as $forma) {
        include 'radioForma.php';
    } ?>
    <button type="submit" name="submit" value="forma">Seleccionar</button>
</form>