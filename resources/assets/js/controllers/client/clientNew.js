/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ClientNewController', ['$scope', '$location', 'Client',
        function ($scope, $location, Client) {
            $scope.clients = new Client();
            
            $scope.save = function () {
                //Envia um post direto pro client
                $scope.client.$save().then(function () {
                    $location.path('/clients');
                });
            }
        }]);