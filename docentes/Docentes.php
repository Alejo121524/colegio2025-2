<?php


class Docentes{
   
   

    // 🔸 Constructor (se ejecuta automáticamente al crear el objeto)
    public function __construct() {
        require_once '../config/BaseDatos.php';

    }

    // 🔸 Método (función dentro de la clase)
    public function consultarDocentes() {
        $baseDatos = new BaseDatos();
        

        $sql = "SELECT * FROM docentes";
        return $baseDatos->consultar($sql);
    }
}


?>
