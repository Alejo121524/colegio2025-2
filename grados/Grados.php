<?php


class Grados{
   
   

    // 🔸 Constructor (se ejecuta automáticamente al crear el objeto)
    public function __construct() {
        require_once '../config/BaseDatos.php';

    }

    // 🔸 Método (función dentro de la clase)
    public function consultarGrados() {
        $baseDatos = new BaseDatos();
        

        $sql = "SELECT * FROM grados";
        return $baseDatos->consultar($sql);
    }
}


?>
