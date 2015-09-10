/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.services')
.service('Client', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/client/:id', {id: '@id'}, {
            update: {
                method: 'PUT'
            }
        });
    }]);