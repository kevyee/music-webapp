<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <title>Rhythmiq</title>
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('js_r/jPlayer/jplayer.flat.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ secure_asset('css/css_r/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ secure_asset('css/css_r/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ secure_asset('css/css_r/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ secure_asset('css/css_r/simple-line-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ secure_asset('css/css_r/font.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ secure_asset('css/css_r/app.css') }}" type="text/css" />

    <script>var baseUrl = "{{ url('/') }}";</script> 
</head>
<body>
    <!-- <div> -->
        <div ng-view></div>
    <!-- </div> -->
    <script type="text/javascript" src = "{{ secure_asset('bower_components/angular/angular.js')}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular-sanitize.min.js"></script>
    <script type="text/javascript" src = "{{ secure_asset('bower_components/angular-route/angular-route.min.js')}}"></script>
    <script type="text/javascript" src = "{{ secure_asset('bower_components/angular-cookies/angular-cookies.js')}}"></script>
    <script type="text/javascript" src = "{{ secure_asset('bower_components/angular-soundmanager2/dist/angular-soundmanager2.min.js')}}"></script>
    <script type="text/javascript" src = "{{ secure_asset('js/app.js')}}"></script>
    <script type="text/javascript" src = "{{ secure_asset('js/controllers.js')}}"></script>
    <script type="text/javascript" src = "{{ secure_asset('js/models.js')}}"></script>

    <script src="{{ secure_asset('js_r/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('js_r/bootstrap.js') }}"></script>
    <script src="{{ secure_asset('js_r/app.js') }}"></script>  
    <script src="{{ secure_asset('js_r/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ secure_asset('js_r/app.plugin.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js_r/jPlayer/jquery.jplayer.min.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js_r/jPlayer/add-on/jplayer.playlist.min.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js_r/jPlayer/demo.js') }}"></script>
</body>
</html>