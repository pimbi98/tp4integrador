<?php
require_once "RepositorioEspecie.php";
require_once "Especie.php";
if isset([$_POST['submit']){ //post envia ESPECIE a la base de datos.

} else { //get trae es a la bd.
    $EspecieID = $_GET['especieid'];
    $Especie = new RepositorioEspecie();
    var_dump($EspecieID);
    var_dump($repo);


    $Especie = false;
    $Especie = $repo->get_one($EspecieID);
    if ($Especie != false){
        //Carga formulario.

    } else {
        echo "Error al cargar Especie para actualizar.";
        header("location: ../home.php");
    }
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Especie</title>
</head>
<body>
<h2> Editar Especie </h2>

<form method="post">
    <?php foreach ($Especie as $key => $value); ?>
        <label for="<?php echo $key; ?>"> <?php echo ucfirst($key); ?> </label>
        <input type="text" name="<?php echo $key;?>" id="<?php echo $key;?>"
        value="<?php echo $value;?>" <?php echo ($key === 'especieid' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Modificar">
</form>

<a href="ReadEspecie.php"> Volver </a>
</body>
</html>

