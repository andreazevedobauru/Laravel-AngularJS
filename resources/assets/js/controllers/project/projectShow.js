/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectShowController', ['$scope', 'Project',
        function ($scope, Project) {
            $scope.clients = Project.query();

        }]);