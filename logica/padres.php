<?php
// Paso 1: Leer el contenido del cuerpo de la solicitud HTTP
$jsonEntrada = file_get_contents('php://input');

// Paso 2: Convertir el JSON recibido a un objeto PHP
$objeto = json_decode($jsonEntrada);

require_once '../padres/Padres.php';
$padres = new Padres();
$informacion = $padres->consultarPadres();


// Convertir a JSON
$jsonSalida = json_encode($informacion);
header('Content-Type: application/json');
echo $jsonSalida;
?>