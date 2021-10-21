<?php
require_once ".env.php";
require_once "ControladorSesionEspecie.php";
require_once "RepositorioEspecie.php";

$r = new RepositorioEspecie();
$resultado = $r->read();
if (isset($resultado)) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap.min.css"
</head>
<body>
<h2> Resultados </h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th> # </th> <th> Nombre </th> <th> Descripcion </th> <th> Stock </th> <th> Importe </th> <th> Editar </th> <th> Eliminar </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $fila) :?>
            <tr>
                <td> <?php echo $fila[0]; ?> </td>
                <td> <?php echo $fila[1]; ?> </td>
                <td> <?php echo $fila[2]; ?> </td>
                <td> <?php echo $fila[3]; ?> </td>
                <td> <?php echo $fila[4]; ?> </td>
                <td> <a href="UpdateEspecie.php?especieid=<?php echo $fila[0];?>"> Editar </a> </td>
                <td> <a href="DeleteEspecie.php?especieid=<?php echo $fila[0];?>"> Eliminar </a> </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php } else { ?> 
    <blockquote> No hay especies disponibles </blockquote>
    <?php } ?>
    
    
<a href="../home.php"> Volver </a>    
</body>
</html>

