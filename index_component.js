var app = angular.module('sistemaMatriculas', []);
app.controller('indexController', function($scope, $http) {
    console.log("Index Controller initialized");

    $scope.usuario = "";
    $scope.password = "";

    

    $scope.validarDatosLogin = function() {
        console.log("Estoy en validar datos login");
        console.log("Username: " + $scope.usuario);
        console.log("Password: " + $scope.password);
        if ($scope.usuario === "" || $scope.password === "") {
            alert("Por favor, complete todos los campos.");
            return;
        }
        var datos = {
            accion:  "validarLogin",
            username: $scope.usuario,
            password: $scope.password
            
        };
        $http.post("logica/login.php", datos).then(function (response){
            var mensaje = response.data.message;
            var success = response.data.success;
            if(success === true){
                window.location.href = "panel.php"; 
            }else{
                alert(mensaje);
            }
        });
    }
    







});