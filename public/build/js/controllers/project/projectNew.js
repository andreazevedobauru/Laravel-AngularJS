/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNewController', ['$scope', '$location', 'Project',
        function ($scope, $location, Project) {
            $scope.project = new Project();

            $scope.save = function () {
                if($scope.form.$valid){
                    $scope.project.$save().then(function () {
                        $location.path('/projects);
                    });
                }
            }
        }]);