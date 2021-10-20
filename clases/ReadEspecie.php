<?php
require_once ".env.php";
require_once "ControladorSesionEspecie.php";
require_once "RepositorioEspecie.php";

$r = new RepositorioEspecie();
$resultado = $r->read();
if (isset($resultado)) { ?>
<h2> Resultados </h2>
<table>
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
                <td> <a href="UpdateEspecie.php?id=<?php echo $fila["especieid"];?>"> Editar </a> </td>
                <td> <a href="DeleteEspecie.php?id=<?php echo $fila["especieid"];?>"> Eliminar </a> </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php } else { ?> 
    <blockquote> No hay especies disponibles </blockquote>
    <?php } ?>
    
    
<a href="../home.php"> Volver </a>
