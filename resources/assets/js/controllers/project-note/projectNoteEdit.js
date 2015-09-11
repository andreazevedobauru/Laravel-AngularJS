/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNoteEditController', ['$scope', '$routeParams', '$location', 'ProjectNote',
        function ($scope, $routeParams, $location, ProjectNote) {
            $scope.client = Client.get({id: $routeParams.id});
            
            $scope.save = function () {
                if($scope.form.$valid){
                    Client.update({id: $scope.client.id}, $scope.client, function () {
                        $location.path('/clients');
                    });

                }
            }
        }]);