
var rhythmiq = angular.module('myApp', ['ngRoute', 'ngCookies', 'ngSanitize', 'ngFileUpload', 'angularSoundManager']);

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

        $routeProvider.when('/upload', {
            templateUrl: 'templates/users/upload.html',
            controller: 'songController',
            authenticated: true
        });
        
        $routeProvider.when('/profile', {
            templateUrl: 'templates/users/profile.html',
            controller: 'userController',
            authenticated: true
        });

        $routeProvider.otherwise('/home');

    }
]);


rhythmiq.run(['$rootScope', '$location', 'userModel',
    function($rootScope, $location, userModel) {

         $rootScope.doLogout = function() {
                userModel.doUserLogout().then(function(){
                    myPlaylist.pause();
                    myPlaylist.remove();
                    $location.path('/');
                }).catch(function(response) {
                });
        };

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

                if($location.$$path != '/' && $location.$$path != '/register') {
                    $('#footer_x').css('display','block');
                }
                else {
                    $('#footer_x').css('display','none');
                }

        });

    }
]);
//# sourceMappingURL=app.js.map
