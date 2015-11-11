/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectMemberRemoveController', ['$scope', '$routeParams', '$location', 'ProjectMember',
        function ($scope, $routeParams, $location, ProjectMember) {
            $scope.projectMember = ProjectMember.get({
                id: $routeParams.id,
                idProjectMember: $routeParams.idProjectMember
            });

            $scope.remove = function () {
                $scope.projectMember.$delete({
                    id: $routeParams.id,
                    idProjectMember: $routeParams.idProjectMember
                }).then(function () {
                    $location.path('/project/'+$routeParams.id+'/members');
                });
            }
        }]);