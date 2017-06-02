angular.module('Biblioteca').controller('registroLibrosController', ['$scope', 'registroLibroService', '$sessionStorage', '$location', 'rolAdmin', '$route', '$timeout', function ($scope, agregarLibro, $sessionStorage, $location, rolAdmin, $route, $timeout) {

        $scope.dataRegistrarLibro = {
            id: '',
            isbn: '',
            nombre: '',
            autor: '',
            editorial: '',
            numeropaginas: ''
        };
        $scope.libroRegistrado = false;
        $scope.libroEditado = false;
        $scope.libroEliminado = false;
        $scope.libros = [];
        $scope.edit = {};

        $scope.pintarTabla = function () {
            agregarLibro.obtenerLib.then(function successCallback(response) {
                switch (response.data.code) {
                    case 200:
                        $scope.libros = response.data.datos;
                        break;
                    case 500:
                        $scope.libros = [];
                }
            });
        };

        $scope.pintarTabla();

        $scope.submit = function () {
            agregarLibro.agregarLib($scope.dataRegistrarLibro).then(function successCallback(response) {
                $scope.libroRegistrado = false;
                $scope.dataRegistrarLibro = {};
                if (response.data.code == 500) {
                } else {
                    $scope.libroRegistrado = true;
                    $scope.dataRegistrarLibro = '';
                    $timeout(function () {
                        $('#nuevoLibro').modal('toggle');
                    }, 700);
                    $timeout(function () {
                        // $route.reload();
                        window.location.reload();
                    }, 1000);
                }
            }, function errorCallback(response) {
                console.error(response);
            });
        };




        $scope.editar = function (dato) {
            $scope.edit.id = dato.lib_id;
            $scope.edit.isbn = dato.lib_isbn;
            $scope.edit.nombre = dato.lib_nombre;
            $scope.edit.autor = dato.lib_autor;
            $scope.edit.editorial = dato.lib_editorial;
            $scope.edit.numeropaginas = dato.lib_numeropaginas;
            $('#editarLibro').modal('toggle');
        };

        $scope.submitEditarLibro = function () {
            agregarLibro.editarLib($scope.edit).then(function successCallback(response) {
                $scope.libroEditado = false;
                $scope.edit = {};
                if (response.data.code == 500) {
                } else {
                    $scope.libroEditado = true;
                    $scope.edit = '';
                    $timeout(function () {
                        $('#editarLibro').modal('toggle');
                    }, 700);
                    $timeout(function () {
                        // $route.reload();
                        window.location.reload();
                    }, 1000);
                }
            }, function errorCallback(response) {
                console.error(response);
            });
        };


        $scope.eliminar = function (dato) {
            $('#eliminarLibro').modal('toggle');
            $scope.nombre = dato.lib_nombre;
            $scope.ideliminar = dato.lib_id;
        };

        $scope.submitEliminarLibro = function () {
            agregarLibro.eliminarLib({id: $scope.ideliminar}).then(function successCallback(response) {
                $scope.libroEliminado = false;
                if (response.data.code == 500) {
                } else {
                    $scope.libroEliminado = true;
                    $timeout(function () {
                        $('#eliminarLibro').modal('toggle');
                    }, 700);
                    $timeout(function () {
                        // $route.reload();
                        window.location.reload();
                    }, 1000);
                }
            }, function errorCallback(response) {
                console.error(response);
            });
        };
    }]);