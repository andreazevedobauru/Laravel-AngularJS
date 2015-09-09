/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ClientListController', ['$scope', 'Client',
        function ($scope, Client) {
            $scope.clients = Client.query();

        }]);