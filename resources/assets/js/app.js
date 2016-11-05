
var rhythmiq = angular.module('myApp', ['ngRoute', 'ngCookies', 'ngSanitize']);

rhythmiq.config(['$routeProvider', '$locationProvider',
    function($routeProvider,$locationProvider) {
        $routeProvider.when('/', {
            templateUrl: 'templates/users/login.html',
            controller: 'userController',
            authenticated: false
        });

        $routeProvider.when('/home', {
            templateUrl: 'templates/users/home.html',
            controller: 'userController',
            authenticated: true
        });

        $routeProvider.when('/logout', {
            templateUrl: 'templates/users/logout.html',
            controller: 'userController',
            authenticated: true
        });

        $routeProvider.when('/register', {
            templateUrl: 'templates/users/register.html',
            controller: 'userController',
            authenticated: false
        });
        
        $routeProvider.otherwise('/');

    }
]);

rhythmiq.run(['$rootScope', '$location', 'userModel',
    function($rootScope, $location, userModel) {
        $rootScope.$on('$routeChangeStart',
            function(event, next, current){
                if(next.$$route.authenticated) {
                    if(!userModel.getAuthStatus()){
                        $location.path('/');
                    }
                }

                // console.log(next);
                if (next.$$route.originalPath == '/') {
                    // console.log(userModel.getAuthStatus());
                    if (userModel.getAuthStatus()) {
                        $location.path(current.$$route.originalPath);
                    }
                }
                else {
                }
        });
    }
]);