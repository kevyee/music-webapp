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