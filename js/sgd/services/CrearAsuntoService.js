(function(){
	'use strict'

	angular.module('sgd').factory('CrearAsuntoService', CrearAsuntoService);

	function CrearAsuntoService($resource) {	
    	return $resource('http://158.69.195.209:8080/sigeda/api/ciudad/:id', {id:'@id'}, {'update':{method:'POST'}});
	}
})();