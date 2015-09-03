/**
 * Created by andre on 03/09/2015.
 */
var app = angular.module('app', []);

app.config(function($routeProvider){
    $routeProvider
        .when('/login', {
            templateUrl: 'build/views/login.html'
        })
        .when('/home',{
            templateUrl: 'build/views/home.html',
            controller:  'HomeController'
        })
});