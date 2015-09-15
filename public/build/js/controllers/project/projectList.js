/**
 * Created by andre on 11/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectListController',
        ['$scope','$routeParams', 'Project',
        function ($scope, $routeParams, Project) {
            $scope.projects = Project.query();
        }]
    );