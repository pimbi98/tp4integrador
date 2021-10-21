<?php
require_once "RepositorioEspecie.php";
require_once "Especie.php";
if (isset($_POST['submit'])){ //POST Envia especie a la base de datos.
    $Especie = New Especie($_POST['EspecieNombre'],$_POST['EspecieDescripcion'],$_POST['EspecieStock'],$_POST['EspecieImporte'],$_POST['EspecieID']);
    $repo = New RepositorioEspecie();
    $resultado = $repo->update($Especie);
    if ($resultado === true){
        header("location: ReadEspecie.php");
    } else {
        echo "Error.";
    }

} else { //GET carga formulario.
    $EspecieID = $_GET['especieid'];
    $repo = new RepositorioEspecie();


    $Especie = $repo->get_one($EspecieID);
    // var_dump($Especie);
    if ($Especie != false){
        //carga form.
    } else {
        echo "Error al cargar Especie para actualizar.";
        // header("location: ../home.php");
    }
}
?>

<h2> Editar Especie </h2>

<form method="post">
    <?php foreach ($Especie as $key => $value) : ?>
        <label for="<?php echo $key; ?>"> <?php echo ucfirst($key); ?> </label>
        <input type="text" name="<?php echo $key;?>" id="<?php echo $key;?>" 
        value="<?php echo $value;?>" <?php echo ($key === 'EspecieID' ? 'readonly' : null); ?>>
    <?php echo "<br>"; endforeach; ?>
    <input type="submit" name="submit" value="Modificar">
</form>

<a href="ReadEspecie.php"> Volver </a>