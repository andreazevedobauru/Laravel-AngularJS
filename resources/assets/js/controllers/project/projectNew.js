/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNewController', ['$scope', '$location', '$cookies','Project', 'Client', 'appConfig',
        function ($scope, $location, $cookies, Project, Client, appConfig) {
            $scope.project = new Project();
            $scope.clients = new Client.query();
            $scope.status  = appConfig.project.status;

            $scope.save = function () {
                if($scope.form.$valid){
                    $scope.project.owner_id = $cookies.getObject('user').id;
                    $scope.project.$save().then(function () {
                        $location.path('/projects');
                    });
                }
            }
        }]);