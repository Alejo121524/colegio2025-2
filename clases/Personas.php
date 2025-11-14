<?php
class Login{
   
   

    // 🔸 Constructor (se ejecuta automáticamente al crear el objeto)
    public function __construct() {
        require_once '../config/BaseDatos.php';

    }

    public function consultarPersonas() {
        $baseDatos = new BaseDatos();
        

        $sql = "SELECT * FROM personas";
        $listadoPersonas = $baseDatos->consultar($sql);

        return $resultado = [
            "success" => true,
            "listadoPersonas" => $listadoPersonas
        ];
    }

    public function modificarPersonas($cuerpoPeticion) {
        $baseDatos = new BaseDatos();
        $sql = "UPDATE personas SET 
        tipo_docum_ident = '".$cuerpoPeticion->tipoDocumento."',
        docum_identidad = '".$cuerpoPeticion->documento."',
        nombre1 = '".$cuerpoPeticion->primerNombre."',
        nombre2 = '".$cuerpoPeticion->segundoNombre."',
        apellido1 = '".$cuerpoPeticion->primerApellido."',
        apellido2 = '".$cuerpoPeticion->segundoApellido."',
        fecha_nacim = '".$cuerpoPeticion->fechaNacimiento."',
        direccion = '".$cuerpoPeticion->direccion."',
        correo = '".$cuerpoPeticion->correo."',
        telefono = '".$cuerpoPeticion->telefono."'
        WHERE id_persona = ".$cuerpoPeticion->idPersona;

        $modificado = $baseDatos->sentencia($sql);

        if($modificado){
            return $resultado = [
                "success" => true,
                "message" => "Persona modificada correctamente."
            ];
       
        }else{
            return $resultado = [
                "success" => false,
                "message" => "Error al modificar la persona."
            ];
        }
    }


     public function crearPersonas($cuerpoPeticion) {
        $baseDatos = new BaseDatos();
        $sql = "INSERT INTO personas (
        tipo_docum_ident, docum_identidad, nombre1,
        nombre2, apellido1, apellido2,
        fecha_nacim, direccion, correo, telefono
        ) VALUES (
        '".$cuerpoPeticion->tipoDocumento."', '".$cuerpoPeticion->documento."', '".$cuerpoPeticion->primerNombre."',               
        '".$cuerpoPeticion->segundoNombre."', '".$cuerpoPeticion->primerApellido."', '".$cuerpoPeticion->segundoApellido."',              
        '".$cuerpoPeticion->fechaNacimiento."', '".$cuerpoPeticion->direccion."', '".$cuerpoPeticion->correo."', '".$cuerpoPeticion->telefono."'           
        )";

        $creado = $baseDatos->sentencia($sql);

        if($creado){
            return $resultado = [
                "success" => true,
                "message" => "Persona creada correctamente."
            ];
       
        }else{
            return $resultado = [
                "success" => false,
                "message" => "Error al crear la persona."
            ];
        }
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