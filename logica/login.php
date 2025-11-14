<?php
@session_start();

// Paso 1: Leer el contenido del cuerpo de la solicitud HTTP
$jsonEntrada = file_get_contents('php://input');

// Paso 2: Convertir el JSON recibido a un objeto PHP
$objetoEntrada = json_decode($jsonEntrada);

require_once '../clases/Login.php';
$login = new Login();


switch ($objetoEntrada->accion) {
    case 'validarLogin':
        $informacion = $login->validarCredencialesLogin($objetoEntrada);
        break;
    default:
        $informacion = ["error" => "Acción no válida o no enviada."];
        break;
}

// Convertir a JSON
$jsonSalida = json_encode($informacion);
header('Content-Type: application/json');
echo $jsonSalida;

?>