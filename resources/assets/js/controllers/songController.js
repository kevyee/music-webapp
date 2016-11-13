rhythmiq.controller('songController', ['$scope', '$sce', '$location', 'Upload', 'songModel', 'userModel', function($scope, $sce, $location, Upload, songModel, userModel){ 

    if(userModel.getAuthStatus()) {
        $scope.username  = userModel.getUserObject()['username'];
    }

    //populate genres
    if($location.$$path == '/upload') {
        songModel.getGenreList().then(function(response){
            $scope.data = {
                genres: response.data,
            };
            $scope.selectedGenre = $scope.data.genres[0];
        }).catch(function(response) {
        });
    }

    angular.extend($scope, {
    doSongUpload: function(uploadForm) {
            Upload.upload({
                url: baseUrl + '/api/v1/songs',
                method: 'POST',
                file: $scope.song_file,
                data: {
                    'song_title': $scope.upload_song_title,
                    'gnre_id': $scope.selectedGenre.gnre_id,
                }
            }).then(function(response){
                console.log(response.data);
                $scope.song_file = null;                
                $scope.upload_song_title = null;             
                $scope.upload_success = 'Song has been successfully uploaded! Go to your profile to listen.'
                $scope.showsuccess = true;
                $scope.showerror = false;
            }).catch(function(response) {
                console.log(response.data)
                var error = '';
                angular.forEach(response.data, function(value, key) {
                   error = error + value + '<br>';
                });
                $scope.upload_error = error;
                $scope.showerror = true;
            });
        },

    });

}]);