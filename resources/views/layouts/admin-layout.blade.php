<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Qmdforms') }}</title>

    <!-- Styles -->
    <link href="{{url('css/all.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Miriam+Libre:400,700" rel="stylesheet">

        <!-- Custom CSS -->
    <link href="{{url('css/simple-sidebar.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>
        body {
        font-family: 'Miriam Libre', sans-serif;
        }

        h1,h2,h3,h4,h5,h6{
            font-family: 'Miriam Libre', sans-serif;
        }
    </style>
    
</head>
<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#" style="background-color: #2c3e50; color: #ccc; border-bottom: 1px solid #34495e ">
                        DocStream
                    </a>
                </li>
                <li>
                    <a href="{{url('/dashboard')}}">Dashboard</a>
                </li>

<!--                 <li data-toggle="collapse" data-target="#forms" class="collapsed">
                  <a href="#">Forms  <span class="pull-right" style="margin-right: 15px;"><i class="fa fa-caret-down" aria-hidden="true"></i></span> </a>
                </li>  
                <ul class="sub-menu collapse" id="forms">
                  <li>
                   DRDR Forms
                  </li>
                </ul> -->

                <li>
                    <a href="#">Forms</a>
                </li>

                <li>
                    <a href="{{url('settings')}}">Settings</a>
                </li>
                <li>
                    <a href="#">Roles</a>
                </li>
                <li>
                    <a href="{{url('users')}}">Users</a>
                </li>
            
            </ul>
        </div>

              <nav class="navbar navbar-default navbar-static-top" style="padding: 5px;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
              
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="margin-right: 60px;">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                    @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    <!-- Scripts -->
  <script src="{{url('js/app.js')}}"></script>
  <script src="{{asset('/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
    <script>
       $(":file").filestyle({size: "sm", buttonName: "btn-primary", buttonBefore: true, buttonText: "Choose file"});
     </script>

      <!-- datatables   -->  
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.columnFilter.js') }}"></script>
    <script src="{{ asset('js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>

         <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>
