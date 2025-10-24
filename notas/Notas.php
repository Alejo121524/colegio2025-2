<?php


class Notas{
   
    // 🔸 Constructor (se ejecuta automáticamente al crear el objeto)
    public function __construct() {
        require_once '../config/BaseDatos.php';

    }

    // 🔸 Método (función dentro de la clase)
    public function consultarNotas() {
        $baseDatos = new BaseDatos();
        

        $sql = "SELECT * FROM notas";
        return $baseDatos->consultar($sql);
    }
}


?>
