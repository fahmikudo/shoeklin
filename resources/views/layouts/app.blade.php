<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shoeklin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js" defer></script>
	{{-- <script src="{{ asset('js/jquery.cookie.js') }}"></script> --}}
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    {{-- <script src="{{ asset('js/sb-admin-2.js')}}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
	<link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/faza.css') }}" rel="stylesheet"/>
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico')}}" type="image/x-icon"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/select2-bootstrap.min.css') }}" rel="stylesheet"/>
    <style>
        body {
            overflow-x: hidden;
        }
        .image {
            position: relative;
            width: 130px;
            height: 130px;
            background-size: cover;
        }
        .removePadding {
            padding: 0
        }
    </style>

    <script type="text/javascript">
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">Shoeklin</a>
            </div>
        @include('layouts/menu')
            <ul class="nav navbar-top-links navbar-right">

                {{-- <li class="pull-left">
                    <a href="#">
                        <i class="fa fa-gear fa-lg" style="margin-top: 10px;"></i>
                        Profile
                    </a>
                </li> --}}

                <li class="pull-left" title="Logout">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}

                    </form>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off fa-lg" style="margin-top: 10px;"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script type="text/javascript">
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>
</html>
