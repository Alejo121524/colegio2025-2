<?php


class Padres{
   
   

    // 🔸 Constructor (se ejecuta automáticamente al crear el objeto)
    public function __construct() {
        require_once '../config/BaseDatos.php';

    }

    // 🔸 Método (función dentro de la clase)
    public function consultarPadres() {
        $baseDatos = new BaseDatos();
        

        $sql = "SELECT * FROM padres";
        return $baseDatos->consultar($sql);
    }
}


?>
