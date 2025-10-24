<?php


// Paso 1: Leer el contenido del cuerpo de la solicitud HTTP
$jsonEntrada = file_get_contents('php://input');

// Paso 2: Convertir el JSON recibido a un objeto PHP
$objetoEntrada = json_decode($jsonEntrada);

require_once '../estudiantes/Estudiantes.php';
$estudiante = new Estudiantes();


switch ($objetoEntrada->accion) {
    case 'consultar':
        $informacion = $estudiante->consultarEstudiantes();
        break;
    case 'guardar':
        $informacion = $estudiante->guardarEstudiante($objetoEntrada);
        break;
    case 'modificar':
        $informacion = $estudiante->modificarEstudiante();
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