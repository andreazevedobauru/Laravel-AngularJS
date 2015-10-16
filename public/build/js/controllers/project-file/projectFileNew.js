/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectFileNewController', ['$scope', '$location', '$routeParams', 'ProjectFile',
        function ($scope, $location, $routeParams, ProjectFile) {
            $scope.projectFile = new ProjectFile();
            $scope.projectFile.project_id  = $routeParams.id;

            $scope.save = function () {
                if($scope.form.$valid){
                    $scope.projectFile.$save({id: $routeParams.id}).then(function () {
                        $location.path('/project/'+$routeParams.id+'/files');
                    });
                }
            }
        }]);