/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.controllers')
    .controller('ProjectNoteNewController', ['$scope', '$location', 'Client',
        function ($scope, $location, Client) {
            $scope.client = new Client();
            
            $scope.save = function () {
                if($scope.form.$valid){
                    //Envia um post direto pro client
                    $scope.client.$save().then(function () {
                        $location.path('/clients');
                    });
                }
            }
        }]);