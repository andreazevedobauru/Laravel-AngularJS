/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectTaskNewController', ['$scope', '$location', '$routeParams', 'ProjectTask',
        function ($scope, $location, $routeParams, ProjectTask) {
            $scope.projectTask = new ProjectTask();
            $scope.projectTask.project_id  = $routeParams.id;

            $scope.save = function () {
                if($scope.form.$valid){
                    $scope.projectTask.$save({id: $routeParams.id}).then(function () {
                        $location.path('/project/'+$routeParams.id+'/tasks');
                    });
                }
            }
        }]);