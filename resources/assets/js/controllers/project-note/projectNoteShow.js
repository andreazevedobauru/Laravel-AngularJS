/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNoteShowController', ['$scope', 'ProjectNote',
        function ($scope, ProjectNote) {
            $scope.clients = ProjectNote.query();

        }]);