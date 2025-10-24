<?php


class Materia{
   
   

    // 🔸 Constructor (se ejecuta automáticamente al crear el objeto)
    public function __construct() {
        require_once '../config/BaseDatos.php';

    }

    // 🔸 Método (función dentro de la clase)
    public function consultarMateria() {
        $baseDatos = new BaseDatos();
        

        $sql = "SELECT * FROM materia";
        return $baseDatos->consultar($sql);
    }
}


?>
