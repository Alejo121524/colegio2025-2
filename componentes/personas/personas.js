var app = angular.module('sistemaMatriculas', []);
app.controller('personasController', function($scope, $http) {
    console.log("Personas Controller initialized");

    $scope.listadoPersonas = [];

    $scope.idPersona = "";
    $scope.tipoDocumento= null;
    $scope.documento= "";
    $scope.primerNombre= "";
    $scope.segundoNombre= "";
    $scope.primerApellido= "";
    $scope.segundoApellido= "";
    $scope.fechaNacimiento= "";
    $scope.direccion= "";
    $scope.correo= "";
    $scope.telefono= "";





    $scope.limpiarFormulario = function() {
        $scope.idPersona = "";
        $scope.tipoDocumento= null;
        $scope.documento= "";
        $scope.primerNombre= "";
        $scope.segundoNombre= "";
        $scope.primerApellido= "";
        $scope.segundoApellido= "";
        $scope.fechaNacimiento= "";
        $scope.direccion= "";
        $scope.correo= "";
        $scope.telefono= "";
    }



    $scope.cargarListadoPersonas = function() {
        console.log("Estoy cargando el listado de personas"); 
        var datos = {
            accion:  "consultarPersonas" 
        };
        $http.post("../../logica/personas.php", datos).then(function (response){
            $scope.listadoPersonas = response.data.listadoPersonas;
            var success = response.data.success;
            if(success === true){
                console.log("Listado de personas recibido:", $scope.listadoPersonas);
            }else{
                var mensaje = response.data.mensaje;
                alert(mensaje);
            }
        });
    }



    $scope.seleccionarPersona = function(persona) {
        console.log("Seleccionando persona con ID:", persona);
        $scope.idPersona= persona.id_persona;
        $scope.tipoDocumento= persona.tipo_docum_ident;
        $scope.documento= persona.docum_identidad;
        $scope.primerNombre= persona.nombre1;
        $scope.segundoNombre= persona.nombre2;
        $scope.primerApellido= persona.apellido1;
        $scope.segundoApellido= persona.apellido2;
        $scope.fechaNacimiento= persona.fecha_nacim;
        $scope.direccion= persona.direccion;
        $scope.correo= persona.correo;
        $scope.telefono= persona.telefono;
    }




    $scope.modificarPersona = function(){
        console.log("Modificando persona con ID:", $scope.idPersona);
         var datos = {
            accion:  "modificarPersonas", 
            idPersona: $scope.idPersona,
            tipoDocumento: $scope.tipoDocumento,
            documento: $scope.documento,
            primerNombre: $scope.primerNombre,
            segundoNombre: $scope.segundoNombre,
            primerApellido: $scope.primerApellido,
            segundoApellido: $scope.segundoApellido,
            fechaNacimiento: $scope.fechaNacimiento,
            direccion: $scope.direccion,
            correo: $scope.correo,
            telefono: $scope.telefono
        };
        $http.post("../../logica/personas.php", datos).then(function (response){                                                                        
            var success = response.data.success;
            if(success === true){
                alert("Persona modificada exitosamente");
                $scope.cargarListadoPersonas();
                $scope.limpiarFormulario();
            }else{
                var mensaje = response.data.mensaje;
                alert(mensaje);
            }
        });  
        
    }




    $scope.crearPersona = function(){
        console.log("Crear persona");
         var datos = {
            accion:  "crearPersonas", 
            tipoDocumento: $scope.tipoDocumento,
            documento: $scope.documento,
            primerNombre: $scope.primerNombre,
            segundoNombre: $scope.segundoNombre,
            primerApellido: $scope.primerApellido,
            segundoApellido: $scope.segundoApellido,
            fechaNacimiento: $scope.fechaNacimiento,
            direccion: $scope.direccion,
            correo: $scope.correo,
            telefono: $scope.telefono
        };
        $http.post("../../logica/personas.php", datos).then(function (response){                                                                        
            var success = response.data.success;
            if(success === true){
                alert("Persona creada exitosamente");
                $scope.cargarListadoPersonas();
                $scope.limpiarFormulario();
            }else{
                var mensaje = response.data.mensaje;
                alert(mensaje);
            }
        });   
    }



    

    $scope.cargarListadoPersonas();


    
});