/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectRemoveController', ['$scope', '$routeParams', '$location', 'Project',
        function ($scope, $routeParams, $location, Project) {
            $scope.project = Project.get({
                id: $routeParams.id
            });

            $scope.remove = function () {
                $scope.project.$delete({
                    id: null, idNote: $scope.project.id
                }).then(function () {
                    $location.path('/project/'+$routeParams.id);
                });
            }
        }]);