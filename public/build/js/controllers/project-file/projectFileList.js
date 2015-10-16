/**
 * Created by andre on 11/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjecFileListController',
        ['$scope','$routeParams', 'ProjectFile',
        function ($scope, $routeParams, ProjectFile) {
            $scope.projectFiles = ProjectFile.query({id: $routeParams.id});

        }]);