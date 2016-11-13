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
            console.log(response);
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
            alert(data);
        });
    };

    userModel.getGenreList = function() {
        return $http({
            headers: {
                'Content-Type': 'application/json'
            },
            url: baseUrl + '/api/v1/genres/all',
            method: "GET"
        }).success(function(response) {
            return response;
        }).error(function(data, status, headers) {
            alert(data);
        });
    };


    return userModel;
}]);
rhythmiq.factory('songModel', ['$http', '$cookies', function($http, $cookies){
    var songModel = {};

    songModel.doSongUpload = function(song) {
        return $http({
            headers: {
                'Content-Type': 'application/json'
            },
            url: baseUrl + '/api/v1/songs',
            method: "POST",
            data: {
                song_file: song.song_file,
                song_file_image: song.song_file,
                song_title: song.song_title,
                gnre_id: song.gnre_id,
            }
        }).success(function(response) {
            // $cookies.put('auth', JSON.stringify(response));
        }).error(function(data, status, headers) {
        });
    };

    songModel.getUserSongs = function() {
        return $http({
            headers: {
                'Content-Type': 'application/json'
            },
            url: baseUrl + '/api/v1/songs/getUserSongs',
            method: "GET"
        }).success(function(response) {
            
        }).error(function(data, status, headers) {
        });
    };

    songModel.deleteSong = function(song_id) {
        return $http({
            headers: {
                'Content-Type': 'application/json'
            },
            url: baseUrl + '/api/v1/songs/softDelete/' + song_id,
            method: "GET"
        }).success(function(response) {
            
        }).error(function(data, status, headers) {
        });
    };

    songModel.getNewSongs = function() {
        return $http({
            headers: {
                'Content-Type': 'application/json'
            },
            url: baseUrl + '/api/v1/songs/getNewSongs',
            method: "GET"
        }).success(function(response) {
            
        }).error(function(data, status, headers) {
        });
    };

    songModel.getGenreList = function() {
        return $http({
            headers: {
                'Content-Type': 'application/json'
            },
            url: baseUrl + '/api/v1/genres/all',
            method: "GET"
        }).success(function(response) {
            return response;
        }).error(function(data, status, headers) {
            alert(data);
        });
    };


    return songModel;
}]);
//# sourceMappingURL=models.js.map
