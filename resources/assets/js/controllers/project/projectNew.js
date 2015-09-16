/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNewController', ['$scope', '$location', 'Project', 'Client',
        function ($scope, $location, Project, Client) {
            $scope.project = new Project();
            $scope.clients = new Client.query();

            $scope.save = function () {
                if($scope.form.$valid){
                    $scope.project.$save().then(function () {
                        $location.path('/projects');
                    });
                }
            }
        }]);