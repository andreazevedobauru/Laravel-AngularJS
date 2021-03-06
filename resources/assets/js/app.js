/**
 * Created by andre on 03/09/2015.
 */
var app = angular.module('app', ['ngRoute', 'angular-oauth2', 'app.controllers', 'app.services', 'app.filters', 'app.directives',
    'ui.bootstrap.typeahead', 'ui.bootstrap.datepicker', 'ui.bootstrap.tpls', 'ngFileUpload']);

angular.module('app.controllers', ['ngMessages','angular-oauth2']);
angular.module('app.filters', []);
angular.module('app.directives', []);
angular.module('app.services', ['ngResource']);


app.provider('appConfig', ['$httpParamSerializerProvider', function ($httpParamSerializerProvider) {
    var config = {
        baseUrl: 'http://laravel-angular',
        project: {
            status: [
                {value: 1, label: 'N�o iniciado'},
                {value: 2, label: 'Iniciado'},
                {value: 3, label: 'Concluido'}
            ]
        },
        projectTask: {
            status: [
                {value: 1, label: 'Incompleta'},
                {value: 2, label: 'Completa'}
            ]
        },
        urls: {
            projectFile: '/project/{{id}}/file/{{idFile}}'
        },
        utils: {
            transformRequest: function(data) {
                if (angular.isObject(data)) {
                    return $httpParamSerializerProvider.$get()(data);
                }
                return data;
            },
            transformResponse: function(data, headers) {
                var headersGetter = headers();

                if (headersGetter['content-type'] == 'application/json' ||
                    headersGetter['content-type'] == 'text/json') {
                    var dataJson = JSON.parse(data);
                    if (dataJson.hasOwnProperty('data')) {
                        dataJson = dataJson.data;
                    }
                    return dataJson;
                }

                return data;
            }
        }

    };

    return {
        config: config,
        $get: function () {
            return config;
        }
    }
}]);

app.config(['$routeProvider','$httpProvider', 'OAuthProvider', 'appConfigProvider', 'OAuthTokenProvider',
    function($routeProvider, $httpProvider, OAuthProvider, appConfigProvider, OAuthTokenProvider){
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
        $httpProvider.defaults.headers.put['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
        $httpProvider.defaults.transformRequest = appConfigProvider.config.utils.transformRequest;
        $httpProvider.defaults.transformResponse = appConfigProvider.config.utils.transformResponse;
        $httpProvider.interceptors.push('oauthFixInterceptor');

    $routeProvider
        .when('/login', {
            templateUrl: 'build/views/login.html',
            controller: 'LoginController'
        })
        .when('/logout', {
            resolve: {
                logout: ['$location', 'OAuthToken', function ($location,OAuthToken) {
                    OAuthToken.removeToken();
                    $location.path('/login');
                }]
            }
        })
        .when('/home',{
            templateUrl: 'build/views/home.html',
            controller:  'HomeController'
        })
        /***********************
         * Rotas para Client
         ************************/
        .when('/clients',{
            templateUrl: 'build/views/client/list.html',
            controller:  'ClientListController'
        })
        .when('/clients/new',{
            templateUrl: 'build/views/client/new.html',
            controller:  'ClientNewController'
        })
        .when('/clients/:id/edit',{
            templateUrl: 'build/views/client/edit.html',
            controller:  'ClientEditController'
        })
        .when('/clients/:id/remove',{
            templateUrl: 'build/views/client/remove.html',
            controller:  'ClientRemoveController'
        })
        /***********************
        * Rotas para Project
        ************************/
        .when('/projects',{
            templateUrl: 'build/views/project/list.html',
            controller:  'ProjectListController'
        })
        .when('/projects/new',{
            templateUrl: 'build/views/project/new.html',
            controller:  'ProjectNewController'
        })
        .when('/project/:id/edit',{
            templateUrl: 'build/views/project/edit.html',
            controller:  'ProjectEditController'
        })
        .when('/project/:id/remove',{
            templateUrl: 'build/views/project/remove.html',
            controller:  'ProjectRemoveController'
        })
        /***********************
        * Rotas para ProjectNote
        ************************/
        .when('/project/:id/notes',{
            templateUrl: 'build/views/project-note/list.html',
            controller:  'ProjectNoteListController'
        })
        .when('/project/:id/notes/:idNote/show',{
            templateUrl: 'build/views/project-note/show.html',
            controller:  'ProjectNoteShowController'
        })
        .when('/project/:id/notes/new',{
            templateUrl: 'build/views/project-note/new.html',
            controller:  'ProjectNoteNewController'
        })
        .when('/project/:id/notes/:idNote/edit',{
            templateUrl: 'build/views/project-note/edit.html',
            controller:  'ProjectNoteEditController'
        })
        .when('/project/:id/notes/:idNote/remove',{
            templateUrl: 'build/views/project-note/remove.html',
            controller:  'ProjectNoteRemoveController'
        })
        /***********************
         * Rotas para ProjectFile
         ************************/
        .when('/project/:id/files',{
            templateUrl: 'build/views/project-file/list.html',
            controller:  'ProjectFileListController'
        })
        .when('/project/:id/files/new',{
            templateUrl: 'build/views/project-file/new.html',
            controller:  'ProjectFileNewController'
        })
        .when('/project/:id/files/:idFile/edit',{
            templateUrl: 'build/views/project-file/edit.html',
            controller:  'ProjectFileEditController'
        })
        .when('/project/:id/files/:idFile/remove',{
            templateUrl: 'build/views/project-file/remove.html',
            controller:  'ProjectFileRemoveController'
        })
        /***********************
         * Rotas para ProjectTask
         ************************/
        .when('/project/:id/tasks',{
            templateUrl: 'build/views/project-task/list.html',
            controller:  'ProjectTaskListController'
        })
        .when('/project/:id/task/new',{
            templateUrl: 'build/views/project-task/new.html',
            controller:  'ProjectTaskNewController'
        })
        .when('/project/:id/task/:idTask/edit',{
            templateUrl: 'build/views/project-task/edit.html',
            controller:  'ProjectTaskEditController'
        })
        .when('/project/:id/task/:idTask/remove',{
            templateUrl: 'build/views/project-task/remove.html',
            controller:  'ProjectTaskRemoveController'
        })
        /***********************
         * Rotas para ProjectMember
         ************************/
        .when('/project/:id/members',{
            templateUrl: 'build/views/project-member/list.html',
            controller:  'ProjectMemberListController'
        })
        .when('/project/:id/member/:idProjectMember/remove',{
            templateUrl: 'build/views/project-member/remove.html',
            controller:  'ProjectMemberRemoveController'
        });

        OAuthProvider.configure({
            baseUrl: appConfigProvider.config.baseUrl,
            clientId: 'appid1',
            clientSecret: 'secret', // optional
            grantPath: 'oauth/access_token'
        });

        OAuthTokenProvider.configure({
            name: 'token',
            options: {
                secure: false
            }
        });

}]);

app.run(['$rootScope', '$location', '$http', 'OAuth', function($rootScope, $location, $http, OAuth) {

    $rootScope.$on('$routeChangeStart', function (event, next, current) {
        if(next.$$route.originalPath != '/login'){
            debugger;
            if(!OAuth.isAuthenticated()){
                debugger;
                $location.path('login');
            }
        }
    });

    $rootScope.$on('oauth:error', function(event, data) {
        // Ignore `invalid_grant` error - should be catched on `LoginController`.

        if ('invalid_grant' === data.rejection.data.error) {
            console.log('invalid_grant');
            return;
        }

        // Refresh token when a `invalid_token` error occurs.
        if ('access_denied' === data.rejection.data.error) {

            return OAuth.getRefreshToken().then(function (data) {
                $http(data.rejection.config).then(function (response) {
                    return data.deferred.resolve(response);
                });
            });
        }

        // Redirect to `/login` with the `error_reason`.
        return $location('login');
    });
}]);