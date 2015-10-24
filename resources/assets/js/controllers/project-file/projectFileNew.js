/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectFileNewController', ['$scope', '$location', 'appConfig', '$routeParams', 'Url', 'Upload',
        function ($scope, $location, appConfig, $routeParams, Url, Upload) {

            //console.log($scope.projectFile.project_id);
            console.log(Url.getUrlResource('/project/{{id}}/file/{{idFile}}'));
            console.log(Url.getUrlFromUrlSymbol('/project/{{id}}/file/{{idFile}}', {id:1, idFile: 10}));
            console.log(Url.getUrlFromUrlSymbol('/project/{{id}}/file/{{idFile}}', {id:'', idFile: 10}));
            console.log(Url.getUrlFromUrlSymbol('/project/{{id}}/file/{{idFile}}', {id:1, idFile: ''}));
            $scope.save = function () {
                if($scope.form.$valid){
                    var url = appConfig.baseUrl + Url.getUrlFromUrlSymbol(appConfig.urls.projectFile,{
                            id: $routeParams.id,
                            idFile: ''
                        });
                    Upload.upload({
                        url: url,
                        fields:{
                            name: $scope.projectFile.name,
                            description: $scope.projectFile.description,
                            project_id: $routeParams.id
                        },
                        file: $scope.projectFile.file
                        /*data: {
                            file: $scope.projectFile.file,
                            'name': $scope.projectFile.name,
                            'description': $scope.projectFile.description,
                            'project_id': $routeParams.id}
                            */
                    }).success(function (data, status, headers, config) {
                        $location.path('/project/'+$routeParams.id+'/files');
                    });
                    /*.then(function (resp) {
                        $location.path('/project/'+$routeParams.id+'/files');
                        //console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
                    });*/
                }
                /*$scope.projectFile.$save({id: $routeParams.id}).then(function () {
                 $location.path('/project/'+$routeParams.id+'/files');
                 });*/
            }
        }]);