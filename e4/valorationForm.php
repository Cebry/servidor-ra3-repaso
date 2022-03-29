<form action="" method="POST">
    <div class="grid-6">
        <span>Valoración</span>
        <?php
        foreach ($valoraciones as $valoracion) {
            echo '<span>' . $valoracion . '</span>';
        }
        ?>
        <?php
        foreach ($items as $item) {
            include  'valorationItem.php';
        }
        ?>
    </div>
    <button type="submit" name="submit">Valorar</button>
</form>