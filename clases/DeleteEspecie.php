<?php
require_once 'Especie.php';
require_once 'RepositorioEspecie.php';

$r = new RepositorioEspecie();
$resultado = $r->delete($_GET['especieid']);
if (isset($resultado)){
    var_dump($resultado);
    if ($resultado === true) {
        $mensaje = 'Registro Eliminado correctamente.';
    } else {
        $mensaje = 'Error al eliminar la especie.';
    }
    header('Location: ReadEspecie.php?m='.$mensaje);
} else {
    echo 'error';
}

?>

