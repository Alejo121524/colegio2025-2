<?php
class Login{
   
   

    // 🔸 Constructor (se ejecuta automáticamente al crear el objeto)
    public function __construct() {
        require_once '../config/BaseDatos.php';

    }

    // 🔸 Método (función dentro de la clase)
    public function validarCredencialesLogin($cuerpoPeticion) {
        
        $username  = $cuerpoPeticion->username;
        $password = $cuerpoPeticion->password;

        $baseDatos = new BaseDatos();
        $sql = "SELECT * FROM usuarios WHERE usuario_ingreso = '".$username."' and contrasena_ingreso = '".$password."' ";
        $resultados = $baseDatos->consultar($sql);
        if(count($resultados) > 0){
            $_SESSION['usuario'] = $username;
            return ["success" => true, "message" => "Credenciales válidas."];

        }else{
            return ["success" => false, "message" => "Credenciales inválidas."];
        }
    }

}

?>