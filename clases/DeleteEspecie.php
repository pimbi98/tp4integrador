<?php
require_once 'Especie.php';
require_once 'RepositorioEspecie.php';
$r = new RepositorioEspecie();
$resultado = $r->delete($_GET['especieid']);
if (isset($resultado));{
    var_dump($resultado);
    if ($resultado === true){
        header('Location: ReadEspecie.php');
    } else {
        echo "Error al eliminar especie.";
    }
}

?>

