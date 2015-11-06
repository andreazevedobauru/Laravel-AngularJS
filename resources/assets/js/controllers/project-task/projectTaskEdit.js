/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNoteEditController', ['$scope', '$routeParams', '$location', 'ProjectNote',
        function ($scope, $routeParams, $location, ProjectNote) {
            $scope.projectNote = ProjectNote.get({
                id: $routeParams.id,
                idNote: $routeParams.idNote
            });
            
            $scope.save = function () {
                if($scope.form.$valid){
                    ProjectNote.update({id: $routeParams.id, idNote: $scope.projectNote.id}, $scope.projectNote, function () {
                        $location.path('/project/'+$routeParams.id+'/notes');
                    });
                }
            }
        }]);