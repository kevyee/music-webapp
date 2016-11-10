<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <title>Rhythmiq</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js_r/jPlayer/jplayer.flat.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/css_r/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/css_r/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/css_r/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/css_r/simple-line-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/css_r/font.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/css_r/app.css') }}" type="text/css" />

    <script>var baseUrl = "{{ url('/') }}";</script> 
</head>
<body>
    after logged in
    <!-- <div> -->
        <div ng-view></div>
    <!-- </div> -->
    <script type="text/javascript" src = "{{ asset('bower_components/angular/angular.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular-sanitize.min.js"></script>
    <script type="text/javascript" src = "{{ asset('bower_components/angular-route/angular-route.min.js')}}"></script>
    <script type="text/javascript" src = "{{ asset('bower_components/angular-cookies/angular-cookies.js')}}"></script>
    <script type="text/javascript" src = "{{ asset('bower_components/angular-soundmanager2/dist/angular-soundmanager2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/ng-file-upload/ng-file-upload-shim.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/ng-file-upload/ng-file-upload.min.js')}}"></script>
    <script type="text/javascript" src = "{{ asset('js/app.js')}}"></script>
    <script type="text/javascript" src = "{{ asset('js/controllers.js')}}"></script>
    <script type="text/javascript" src = "{{ asset('js/models.js')}}"></script>

    <script src="{{ asset('js_r/jquery.min.js') }}"></script>
    <script src="{{ asset('js_r/bootstrap.js') }}"></script>
    <script src="{{ asset('js_r/app.js') }}"></script>  
    <script src="{{ asset('js_r/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js_r/app.plugin.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js_r/jPlayer/jquery.jplayer.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js_r/jPlayer/add-on/jplayer.playlist.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js_r/jPlayer/demo.js') }}"></script>
    <footer class="footer bg-dark" id="footer_x">
                  <div id="jp_container_N">
                    <div class="jp-type-playlist">
                      <div id="jplayer_N" class="jp-jplayer hide"></div>
                      <div class="jp-gui">
                        <div class="jp-video-play hide">
                          <a class="jp-video-play-icon">play</a>
                        </div>
                        <div class="jp-interface">
                          <div class="jp-controls">
                            <div><a class="jp-previous"><i class="icon-control-rewind i-lg"></i></a></div>
                            <div>
                              <a class="jp-play"><i class="icon-control-play i-2x"></i></a>
                              <a class="jp-pause hid"><i class="icon-control-pause i-2x"></i></a>
                            </div>
                            <div><a class="jp-next"><i class="icon-control-forward i-lg"></i></a></div>
                            <div class="hide"><a class="jp-stop"><i class="fa fa-stop"></i></a></div>
                            <div><a class="" data-toggle="dropdown" data-target="#playlist"><i class="icon-list"></i></a></div>
                            <div class="jp-progress hidden-xs">
                              <div class="jp-seek-bar dk">
                                <div class="jp-play-bar bg-info">
                                </div>
                                <div class="jp-title text-lt">
                                  <ul>
                                    <li></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="hidden-xs hidden-sm jp-current-time text-xs text-muted"></div>
                            <div class="hidden-xs hidden-sm jp-duration text-xs text-muted"></div>
                            <div class="hidden-xs hidden-sm">
                              <a class="jp-mute" title="mute"><i class="icon-volume-2"></i></a>
                              <a class="jp-unmute hid" title="unmute"><i class="icon-volume-off"></i></a>
                            </div>
                            <div class="hidden-xs hidden-sm jp-volume">
                              <div class="jp-volume-bar dk">
                                <div class="jp-volume-bar-value lter"></div>
                              </div>
                            </div>
                            <div>
                              <a class="jp-shuffle" title="shuffle"><i class="icon-shuffle text-muted"></i></a>
                              <a class="jp-shuffle-off hid" title="shuffle off"><i class="icon-shuffle text-lt"></i></a>
                            </div>
                            <div>
                              <a class="jp-repeat" title="repeat"><i class="icon-loop text-muted"></i></a>
                              <a class="jp-repeat-off hid" title="repeat off"><i class="icon-loop text-lt"></i></a>
                            </div>
                            <div class="hide">
                              <a class="jp-full-screen" title="full screen"><i class="fa fa-expand"></i></a>
                              <a class="jp-restore-screen" title="restore screen"><i class="fa fa-compress text-lt"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="jp-playlist dropup" id="playlist">
                        <ul class="dropdown-menu aside-xl dker">
                          <!-- The method Playlist.displayPlaylist() uses this unordered list -->
                          <li class="list-group-item"></li>
                        </ul>
                      </div>
                      <div class="jp-no-solution hide">
                        <span>Update Required</span>
                        To play the media you will need to either update your browser to a recent version or update your <a target="_self" href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                      </div>
                    </div>
                  </div>
                </footer>
</body>
</html>