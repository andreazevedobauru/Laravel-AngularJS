/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectEditController', ['$scope', '$routeParams', '$location', 'Project',
        function ($scope, $routeParams, $location, Project) {
            $scope.project = Project.get({
                id: $routeParams.id
            });
            
            $scope.save = function () {
                if($scope.form.$valid){
                    Project.update({id: $scope.project.id}, $scope.project, function () {
                        $location.path('/project/'+$routeParams.id);
                    });
                }
            }
        }]);