/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNewController', ['$scope', '$location', '$cookies','Project', 'Client', 'appConfig',
        function ($scope, $location, $cookies, Project, Client, appConfig) {
            $scope.project = new Project();
            $scope.clients = new Client.query();
            $scope.status  = appConfig.project.status;

            $scope.save = function () {
                if($scope.form.$valid){
                    $scope.project.owner_id = $cookies.getObject('user').id;
                    $scope.project.$save().then(function () {
                        $location.path('/projects');
                    });
                }
            };

            $scope.formatName = function(id){
                if(id){
                    for(var i in $scope.clients){
                        if($scope.clients[i].id == id){
                            return $scope.clients[i].nome;
                        }
                    }
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
        }]);