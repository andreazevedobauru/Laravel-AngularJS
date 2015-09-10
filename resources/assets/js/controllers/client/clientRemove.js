/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ClientRemoveController', ['$scope', '$routeParams', '$location', 'Client',
        function ($scope, $routeParams, $location, Client) {
            $scope.client = Client.get({id: $routeParams.id});

            $scope.remove = function () {
                $scope.client.$delete().then(function () {
                    $location.path('/clients');
                });
            }
        }]);