/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectFileNewController', ['$scope', '$location', '$routeParams', 'Upload',
        function ($scope, $location, $routeParams, Upload) {
            $scope.projectFile = {
                project_id: $routeParams.id
            };

            $scope.save = function () {
                if($scope.form.$valid){
                    Upload.upload({
                        url: '',
                        data: {file: $scope.projectFile.file,  'name': $scope.projectFile.name, 'description': $scope.projectFile.description }
                    }).then(function (resp) {
                        $location.path('/project/'+$routeParams.id+'/files');
                        //console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
                    });
                }
                /*$scope.projectFile.$save({id: $routeParams.id}).then(function () {
                 $location.path('/project/'+$routeParams.id+'/files');
                 });*/
            }
        }]);