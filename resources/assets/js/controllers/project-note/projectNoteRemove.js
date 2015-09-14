/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNoteRemoveController', ['$scope', '$routeParams', '$location', 'ProjectNote',
        function ($scope, $routeParams, $location, ProjectNote) {
            $scope.projectNote = ProjectNote.get({
                id: $routeParams.id,
                idNote: $routeParams.idNote
            });

            $scope.remove = function () {
                $scope.projectNote.$delete({
                    id: null, idNote: $scope.projectNote.id
                }).then(function () {
                    $location.path('/project/'+$routeParams.id+'/notes');
                });
            }
        }]);