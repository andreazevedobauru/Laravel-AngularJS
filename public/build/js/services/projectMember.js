/**
 * Created by andre on 09/09/2015.
 */
angular.module('app.services')
.service('ProjectMember', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/project/:id/member/:idProjectMember', {id: '@id', idMember: '@idProjectMember'}, {
            update: {
                method: 'PUT'
            }
        });
    }]);