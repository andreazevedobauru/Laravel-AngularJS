/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectFileEditController', ['$scope', '$routeParams', '$location', 'ProjectFile',
        function ($scope, $routeParams, $location, ProjectFile) {
            $scope.projectFile = ProjectFile.get({
                id: $routeParams.id,
                idFile: $routeParams.idFile
            });
            
            $scope.save = function () {
                if($scope.form.$valid){
                    ProjectFile.update({id: null, idFile: $scope.projectFile.id}, $scope.projectFile, function () {
                        $location.path('/project/'+$routeParams.id+'/files');
                    });
                }
            }
        }]);