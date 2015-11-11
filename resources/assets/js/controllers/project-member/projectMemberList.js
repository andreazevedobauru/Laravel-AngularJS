/**
 * Created by andre on 11/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectMemberListController',
        ['$scope','$routeParams', 'ProjectMember', 'User',
        function ($scope, $routeParams, ProjectMember, User) {
            $scope.projectMember = new ProjectMember();

            $scope.save = function () {
                if($scope.form.$valid){
                    $scope.projectMember.$save({id: $routeParams.id}).then(function(){
                        $scope.projectMember = new ProjectMember();
                        $scope.loadMember();
                    });
                }
            };

            $scope.loadMember = function (){
                $scope.projectMembers = ProjectMember.query({
                    id: $routeParams.id,
                    orderBy: 'id',
                    sortedBy: 'desc'
                });
            };

            $scope.formatName = function(model){
                if(model){
                    return model.nome;
                }
                return '';
            };

            $scope.getUsers = function (name) {
                return User.query({
                    search: name,
                    searchFields: 'name:like'
                }).$promise;
            };

            $scope.selectUser = function (item) {
                $scope.projectMember.member_id = item.id;
            };

            $scope.loadMember();
        }]
    );