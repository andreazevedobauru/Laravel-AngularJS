/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectEditController',['$scope','$routeParams', '$location', '$cookies','Project', 'Client', 'appConfig',
        function ($scope, $routeParams, $location, $cookies, Project, Client, appConfig) {
            Project.get({id: $routeParams.id}, function(data){
                $scope.project = data;
                Client.get({ id: data.client_id }, function(data){
                    $scope.clientSelected  = data;
                });
            });

            $scope.status  = appConfig.project.status;

            $scope.save = function () {
                if($scope.form.$valid){
                    $scope.project.owner_id = $cookies.getObject('user').id;
                    Project.update({id: $scope.project.id}, $scope.project, function(){
                       $location.path('/projects');
                    });
                }
            };

            $scope.formatName = function(model){
                if(model){
                    return model.nome;
                }
                return '';
            };

            $scope.getClients = function(nome){
                debugger;
                return Client.query({
                    search: nome,
                    searchFields: 'nome:like'
                }).$promise;
            };

            $scope.selectClient = function(item){
                $scope.project.client_id = item.id;
            };

        }]);