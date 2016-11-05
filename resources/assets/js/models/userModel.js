rhythmiq.factory('userModel', ['$http', '$cookies', function($http, $cookies){
    var userModel = {};
    userModel.doLogin = function(user) {
        return $http({
            headers: {
                'Content-Type': 'application/json'
            },
            url: baseUrl + '/api/v1/users/login',
            method: "POST",
            data: {
                email_address: user.email_address,
                password: user.password
            }
        }).success(function(response) {
            $cookies.put('auth', JSON.stringify(response));
        }).error(function(data, status, headers) {
            
        });
    };

    userModel.doRegister = function(user) {
        return $http({
            headers: {
                'Content-Type': 'application/json'
            },
            url: baseUrl + '/api/v1/users',
            method: "POST",
            data: {
                email_address: user.email_address,
                username: user.username,
                password: user.password,
                confirm_password: user.confirm_password,
                date_of_birth: user.date_of_birth,
                city_id: user.city_id
            }
        }).success(function(response) {
            // $cookies.put('auth', JSON.stringify(response));
        }).error(function(data, status, headers) {
            
        });
    };

    userModel.getAuthStatus = function() {
        var status = $cookies.get('auth');
        if(status) {
            return true;
        } else {
            return false;
        }
    };

    userModel.getUserObject = function() {
        var userObj = angular.fromJson($cookies.get('auth'));
        return userObj;
    };

    userModel.doUserLogout = function() {
        return $http({
            url: baseUrl + '/api/v1/users/logout',
            method: "POST"
        }).success(function(response) {
            $cookies.remove('auth');   
            console.log(response);        
        }).error(function(data, status, headers) {
            console.log(data);
        });
    };


    userModel.getCityList = function() {
        return $http({
            headers: {
                'Content-Type': 'application/json'
            },
            url: baseUrl + '/api/v1/citys/all',
            method: "GET"
        }).success(function(response) {
            return response;
        }).error(function(data, status, headers) {
            
        });
    };


    return userModel;
}]);