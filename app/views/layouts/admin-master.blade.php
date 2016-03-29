<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Westmoreland - Admin</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Toastr style -->
    <link href="/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    @yield('top-script')

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <p class="company-name">Westmoreland</p>
                        </div>
                        <div class="logo-element">

                        </div>
                    </li>
                    <li class="{{{ (Request::is('admin/projects*')) ? 'active' : ''  }}}">
                        <a href="#">
                            <i class="fa fa-gavel"></i>
                            <span class="nav-label">Projects</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li class="{{{ (Request::is('admin/projects')) ? 'active' : ''  }}}"><a href="{{{ action('ProjectsController@index') }}}">View Projects</a></li>
                            <li class="{{{ (Request::is('admin/projects/create')) ? 'active' : ''  }}}"><a href="{{{ action('ProjectsController@create') }}}">Add New Project</a></li>
                        </ul>
                    </li>
                    <li class="{{{ (Request::is('admin/customers*')) ? 'active' : ''  }}}">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="nav-label">Customers</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{{ (Request::is('admin/customers')) ? 'active' : ''  }}}"><a href="{{{ action('CustomersController@index') }}}">View Customers</a></li>
                            <li class="{{{ (Request::is('admin/customers/create')) ? 'active' : ''  }}}"><a href="{{{ action('CustomersController@create') }}}">Add New Customer</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="{{{ (Request::is('admin/about-us*')) ? 'active' : ''  }}}" href="#">
                            <i class="fa fa-info"></i>
                            <span class="nav-label">About Us Information</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{{ (Request::is('admin/about-us/edit')) ? 'active' : ''  }}}"><a href="{{{ action('AboutUsController@editCurrent') }}}">Edit Current About Us Info</a></li>
                            <li class="{{{ (Request::is('admin/about-us/create')) ? 'active' : ''  }}}"><a href="{{{ action('AboutUsController@create') }}}">Update About Us Info</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        @if(Auth::check())
                            <li>
                                <span class="m-r-sm text-muted welcome-message">Welcome {{{ Auth::user()->first_name }}}, to Westmoreland Admin Section.</span>
                            </li>
                            <li>
                                <a href="{{{ action('UsersController@logout') }}}">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        @endif
                    </ul>

                </nav>
            </div>

            @if (Session::has('successMessage'))
                <div class="alert alert-success dif-col">{{{ Session::get('successMessage') }}}</div>
            @endif
            @if (Session::has('errorMessage'))
                <div class="alert alert-danger dif-col">{{{ Session::get('errorMessage') }}}</div>
            @endif

            @yield('content')

        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>

    @yield('bottom-script')
</body>
</html>
