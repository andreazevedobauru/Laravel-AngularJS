/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.services')
.service('Project', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/project/:id', {id: '@id'}, {
            update: {
                method: 'PUT'
            }
        });
    }]);