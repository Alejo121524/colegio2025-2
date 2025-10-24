(function(){
    'use strict'
    var app = angular.module('sgd', ['ngNewRouter','ngMessages','ngResource','ngAnimate','vAccordion','angularUtils.directives.dirPagination','ui.bootstrap']);
    
    app.controller('AppController', AppController);
    app.controller('IndexController', IndexController);
    app.controller('PerfilController', ['$scope', '$http', 'PerfilesService',function($scope, $http, PerfilesService, $window) {     

    $scope.objeto = {accion: 1};

    $http({
        url: "logica/panel.php", 
        method: "POST", 
        data: $scope.objeto
    }).then(function(response) {
        PerfilesService.perfiles = response.data.perfiles;
    });

    $scope.menu = function(){     

      switch($scope.perfil.nombre){
        case 'Contrato_Estudios_Previos_Jefe_Oficina':
          $("#padreEstudioPrevio").css("display", "");
          $("#padreParametrizar").css("display", "none");
        break;
        case 'Contrato_Estudios_Previos_Ordenador_Gasto':
          $("#padreEstudioPrevio").css("display", "");
          $("#padreParametrizar").css("display", "none");
        break;
      }

      PerfilesService.perfilSelected = $scope.perfil;
      $scope.objeto = {
        accion: 2,
        perfil: $scope.perfil
      };
      $http({
          url: "logica/panel.php", 
          method: "POST",
          data: $scope.objeto
      }).then(function(response) {

      });
    }
    }]);

    app.factory('PerfilesService', [function(){
      var perfilService = {
          perfilSelected:'', 
          perfiles:[],
          getPerfilSelected: function(){return perfilService.perfilSelected;},
          setPerfilSelected: function(p){perfilService.perfilSelected = p;}
      };    
      return perfilService;
    }]);

    function AppController($rootScope, $router) {
      $rootScope.estado = 0;      
      $rootScope.vencidos = [];
      $rootScope.selectVencidos = {};
      $rootScope.mensajes = [];
      $rootScope.selectMensajes = {};
      $rootScope.calificar = [];
      $rootScope.selectCalificar = {};
      $rootScope.perfil = '';

      $router.config([
       { path: '/', redirectTo: '/actividad' },  
       { path: '/index', component: 'index' },  
       { path: '/usuario', component: 'usuario' }, 

       { path: '/principal', component: 'principal' },   
       { path: '/principalOne', component: 'principal' },    
       { path: '/principalTwo', component: 'principal' },   
       { path: '/principalThree', component: 'principal' }, 
       { path: '/principalFour', component: 'principal' },   
       { path: '/principalFive', component: 'principal' },    
       { path: '/principalSix', component: 'principal' },   
       { path: '/principalSeven', component: 'principal' },   
       { path: '/principalEight', component: 'principal' }, 

       { path: '/actividad', component: 'actividad' },    
       { path: '/slider', component: 'slider' },      
       { path: '/noticiascategorias', component: 'noticiascategorias' },
       { path: '/noticias', component: 'noticias' },
       { path: '/eventos', component: 'eventos' },
       { path: '/programas', component: 'programas' },
       { path: '/grabados', component: 'grabados' },
       { path: '/elenco', component: 'elenco' },   
      ]);

      $rootScope.selecVencido = function(vencido){
        $rootScope.selectVencidos = vencido;
        setTimeout(abrirAlerta, 1000, $rootScope.selectVencidos);
      }

      $rootScope.selecMensaje = function(mensaje){
        $rootScope.selectMensajes = mensaje;
        setTimeout(abrirAlerta, 1000, $rootScope.selectMensajes);
      }

      $rootScope.selectCalifica = function(califica){
        $rootScope.selectCalificar = califica;
        setTimeout(abrirAlerta, 1000, $rootScope.selectCalificar);
      }

      function abrirAlerta(arreglo){
        $rootScope.abirirServicio(arreglo);
      }

      $rootScope.cargarGrilla = function(){
        //setTimeout(abrirAlerta2, 1000);
        abrirAlerta2();
      }

      function abrirAlerta2(){
        $rootScope.abirirServicio();
      }
    }

    function IndexController($rootScope, $router) {
      console.log("Index");
    }

    app.directive('ngEnter', function () {

    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });
                event.preventDefault();
            }
        });
    };
});

})();