<?php
require_once 'ControladorSesionEspecie.php';
if (isset($_POST['especieNombre']) && isset($_POST['especieDescripcion'])) {
    $cs = new ControladorSesionEspecie();//apunta a ESPECIE
    $result = $cs->create($_POST['especieNombre'], $_POST['especieDescripcion'], $_POST['especieStock'], $_POST['especieImporte']);
    if($result[0] === true){ //result 0 = true o false
        $redirigir = '../home.php?mensaje='.$result[1];  //analizar //result 1 = mensaje de respuesta del controlador Especie
    } else {
        $redirigir = 'create.php?mensaje='.$result[1];
    }
    header('Location: '. $redirigir);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al sistema VIVERO</title>
</head>
<body class="container">
    <div class="jumbotron text-center">
        <h1>VIVERO </h1>
</div>
<div class="text-center"> <h3> Generar nueva especie </h3> 
<?php
    if (isset($_GET['mensaje'])) {
        echo '<div id="mensaje" class="alert alert-primary text-center"> <p>' . $_GET['mensaje'] . '</p> </div>' ;
    }
?>
<form action="createEspecie.php" method="post">
    <input name="especieNombre" class="form-control form-control-lg" placeholder="Nombre de Especie"><br>
    <input name="especieDescripcion" class="form-control form-control-lg" placeholder="Descripciòn de Especie"><br>
    <input type="number" name="especieStock" class="form-control form-control-lg" placeholder="Cantidad que tenemos en deposito."><br>
    <input type="number" name="especieImporte" class="form-control form-control-lg" placeholder="Precio de venta."><br>
    <input type="submit" value="añadir" class="btn btn-primary"><br>
</form>
</div>

        <a href="../home.php"> Volver </a>
</body>
</html>
