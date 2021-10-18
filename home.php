<?php
require_once 'clases/Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Sistema Vivero</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body class="container">
      <div class="jumbotron text-center">
      <h1>Sistema Vivero</h1>
      </div>
      <div class="jumbotron text-center">
        <p><a href="clases/createEspecie.php"> Generar nuevo registro de especie </a>
        <p><a href="clases/ReadEspecie.php"> Leer datos disponibles </a>
      </div>
      <div class="text-center">
        <h3>Hola <?php echo $nomApe;?></h3>
        <p><a href="logout.php">Cerrar sesión</a></p>
      </div>
    </body>
</html>

