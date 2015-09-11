/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNoteRemoveController', ['$scope', '$routeParams', '$location', 'ProjectNote',
        function ($scope, $routeParams, $location, ProjectNote) {
            $scope.client = ProjectNote.get({id: $routeParams.id});

            $scope.remove = function () {
                $scope.client.$delete().then(function () {
                    $location.path('/clients');
                });
            }
        }]);