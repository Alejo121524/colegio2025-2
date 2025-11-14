<?php


class Estudiantes{
   
   

    // 🔸 Constructor (se ejecuta automáticamente al crear el objeto)
    public function __construct() {
        require_once '../config/BaseDatos.php';

    }

    // 🔸 Método (función dentro de la clase)
    public function consultarEstudiantes() {
        $baseDatos = new BaseDatos();
        

        $sql = "SELECT * FROM estudiantes";
        return $baseDatos->consultar($sql);
    }


    //Metodo para guardar estudiantes
    public function guardarEstudiante($cuerpoPeticion) {

        $estudianteNuevo  = $cuerpoPeticion->estudianteNuevo;
        if ($estudianteNuevo == null) {
        return ["estado" => "error", "mensaje" => "No se recibieron datos para guardar el estudiante"];
    }
        $baseDatos = new BaseDatos();

        $ti_estudiante = $estudianteNuevo->ti_estudiante;
        $nombre1 = $estudianteNuevo->nombre1;
        $nombre2 = $estudianteNuevo->nombre2;
        $apellido1 = $estudianteNuevo->apellido1;
        $apellido2 = $estudianteNuevo->apellido2;
        $fecha_nacimiento = $estudianteNuevo->fecha_nacimiento;
        $id_padre = $estudianteNuevo->id_padre;
        $id_grado = $estudianteNuevo->id_grado;

        $sql = "INSERT INTO estudiantes(ti_estudiante, nombre1, nombre2, apellido1, apellido2, fecha_nacimiento, id_padre, id_grado) 
            VALUES ('$ti_estudiante', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$fecha_nacimiento', $id_padre, $id_grado)";
        return $baseDatos->sentencia($sql); 
    }



    
}

?>
