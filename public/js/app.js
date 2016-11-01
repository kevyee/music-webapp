
var rhythmiq = angular.module('myApp', ['ngRoute', 'ngCookies']);

rhythmiq.config(['$routeProvider', '$locationProvider',
    function($routeProvider,$locationProvider) {
        $routeProvider.when('/', {
            templateUrl: 'templates/users/login.html',
            controller: 'userController'
        });

        $routeProvider.when('/home', {
            templateUrl: 'templates/users/home.html',
            controller: 'userController'
        });

        $routeProvider.when('/logout', {
            templateUrl: 'templates/users/logout.html',
            controller: 'userController'
        });
    }
]);
//# sourceMappingURL=app.js.map
