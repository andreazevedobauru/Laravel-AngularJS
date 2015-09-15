angular.module('app.controllers')
    .controller('HomeController', ['$scope','$cookies', function ($scope, $cookies) {
        //$cookies.get('nomde_do_cookie');
        console.log($cookies.getObject('user').email)
    }]);