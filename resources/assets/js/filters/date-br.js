/**
 * Created by andre on 16/09/2015.
 */

angular.module('app.filters').filter('dateBR',['$filter', function($filter){
    return function(input){
        return $filter('date')(input, 'dd/MM/yyyy');
    };
}]);