/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNewController', ['$scope', '$location', 'Project', 'Client', 'appConfig',
        function ($scope, $location, Project, Client, appConfig) {
            $scope.project = new Project();
            $scope.clients = new Client.query();
            $scope.status  = appConfig.project.status;

            $scope.save = function () {
                if($scope.form.$valid){
                    $scope.project.$save().then(function () {
                        $location.path('/projects');
                    });
                }
            }
        }]);