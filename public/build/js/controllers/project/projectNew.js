/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNewController', ['$scope', '$location', '$routeParams', 'Project',
        function ($scope, $location, $routeParams, Project) {
            $scope.project = new Project();
            $scope.project.project_id  = $routeParams.id;

            $scope.save = function () {
                if($scope.form.$valid){
                    $scope.project.$save({id: $routeParams.id}).then(function () {
                        $location.path('/project/'+$routeParams.id);
                    });
                }
            }
        }]);