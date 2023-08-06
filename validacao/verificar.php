<?php 
require __DIR__ .'./vendor/autoload.php';
use \App\Validation\CPF;

$resultado = CPF::verificar("841.853.370-33");

var_dump($resultado);

?>