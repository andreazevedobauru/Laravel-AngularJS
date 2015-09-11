/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.services')
.service('ProjectNote', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/project/:id/note/:idNote', {id: '@id', idNote: '@idNote'}, {
            update: {
                method: 'PUT'
            }
        });
    }]);