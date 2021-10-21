<?php

?>

<h2> Editar Especie </h2>

<form method="post">
    <?php foreach ($especie as $key => $value) : ?>
        <label for="<?php echo $key; ?>"> <?php echo ucfirst($key); ?> </label>
        <input type="text" name="<?php echo $key;?>" id="<?php echo $key;?>" 
        value="<?php echo $value;?>" <?php echo ($key === 'especieid' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Modificar">
</form>

<a href="ReadEspecie.php"> Volver </a>