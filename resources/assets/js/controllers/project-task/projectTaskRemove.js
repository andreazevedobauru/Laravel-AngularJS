/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectTaskRemoveController',
    ['$scope', '$routeParams', '$location', 'ProjectTask',function ($scope, $routeParams, $location, ProjectTask) {
        $scope.projectTask = ProjectTask.get({
            id: $routeParams.id,
            idTask: $routeParams.idTask
        });

        $scope.remove = function () {
            $scope.projectTask.$delete({
                id: $routeParams.id, idTask: $scope.projectTask.id
            }).then(function () {
                $location.path('/project/'+$routeParams.id+'/tasks');
            });
        }
    }]);