<?php


class Horario{
   
   

    // 🔸 Constructor (se ejecuta automáticamente al crear el objeto)
    public function __construct() {
        require_once '../config/BaseDatos.php';

    }

    // 🔸 Método (función dentro de la clase)
    public function consultarHorario() {
        $baseDatos = new BaseDatos();
        

        $sql = "SELECT * FROM horario";
        return $baseDatos->consultar($sql);
    }
}


?>
