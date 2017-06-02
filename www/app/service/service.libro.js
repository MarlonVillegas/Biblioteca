   angular.module('Biblioteca').service('registroLibroService', ['$http', function($http){
    
    this.agregarLib = function (data) {
      return $http.post('http://localhost/Biblioteca/www/server.php/agregarLibro', $.param(data));
    };

    this.obtenerLib = $http.get('http://localhost/Biblioteca/www/server.php/obtenerLibro');
    
    this.editarLib = function (data) {
      return $http.post('http://localhost/Biblioteca/www/server.php/editarLibro', $.param(data));
    };
    
    this.eliminarLib = function (data) {
      return $http.post('http://localhost/Biblioteca/www/server.php/eliminarLibro', $.param(data));
    };
    
}]);
