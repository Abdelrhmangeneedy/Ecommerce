<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Start of Async Drift Code -->
    <script>
        "use strict";
        
        !function() {
        var t = window.driftt = window.drift = window.driftt || [];
        if (!t.init) {
            if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
            t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
            t.factory = function(e) {
            return function() {
                var n = Array.prototype.slice.call(arguments);
                return n.unshift(e), t.push(n), t;
            };
            }, t.methods.forEach(function(e) {
            t[e] = t.factory(e);
            }), t.load = function(t) {
            var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
            o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
            var i = document.getElementsByTagName("script")[0];
            i.parentNode.insertBefore(o, i);
            };
        }
        }();
        drift.SNIPPET_VERSION = '0.3.1';
        drift.load('2fszwf8hui4z');
    </script>
        <!-- End of Async Drift Code -->

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">


  
    <link rel="icon" type="image/png" href="{{ asset ('assets/img/slider1.jpg') }}">
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
    integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    
</head>
<body>
        <main class="main">
            <div class="content">
                @include('layouts.inc.frontnavbar')
                @yield('content')
                @include('layouts.inc.frontfooter')
            </div>
        </main>  



        <div class="whatsapp-chat">
            <a href=" https://wa.me/+2001062830859"
                target="_blank">
                <img src="{{ asset('assets/img/whatsapp.jpg') }}" alt="Wahtsapp Logo" height="50px" width="50px">
            </a>
        </div>
    



        <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}" ></script>
        <script src="{{ asset('frontend/js/custom.js') }}"></script>



    



    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
          var options = {
            damping: '0.5'
          }
          Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
      </script>
   
       <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
       <script>
            var availableTags = [];
            $.ajax({
                method: "GET",
                url: "product-list",
                success: function(response) {
                    startautocomplete(response)
                }
            });
            function startautocomplete(availableTags){
                $( "#search_product" ).autocomplete({
                    source: availableTags
                });
            }
        </script>



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
    <script>
        swal("{{ session('status') }}")
    </script>
    @endif
</body>
</html>
