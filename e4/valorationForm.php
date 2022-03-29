<form action="" method="POST">
    <div class="grid-6">
        <?php
        foreach ($items as $item) {
            include  'valorationItem.php';
        }
        ?>
    </div>
    <button type="submit" name="submit">Valorar</button>
</form>