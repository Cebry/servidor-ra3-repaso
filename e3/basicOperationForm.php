<form action="" method="POST">
    <input type="hidden" name="operando1" step="1" value="<?php echo $operando1; ?>" readonly>
    <input type="hidden" name="operacion" value="<?php echo $operacion; ?>" readonly>
    <input type="hidden" name="operando2" step="1" value="<?php echo $operando2; ?>" readonly>
    <p><?php echo $operando1 . ' ' . $operacion . ' ' . $operando2; ?></p>
    <input type="number" name="result" id="result" step="1" required>
    <button type="submit" name="submit">Corregir</button>
</form>