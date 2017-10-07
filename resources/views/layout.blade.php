<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laraboard Admin</title>

        @stack('before-styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/slate/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html, body{
                height:100%;
                margin: 0;
            }

            h1 {
                margin-top: 0;
            }

            .navbar {
                background-color: #000;
                border: 0;
                border-radius: 0;
            }
            .navbar {
                margin-bottom: 0;
            }
                .navbar-default .navbar-nav>li>a:hover {
                    color: #777;
                }
/*            .nav-pills li>a {
                border: 0;
            }*/

            .pagination {
                margin-top: 0;
            }
            .btn-light {
                background-color: #CDCDCD;
                color: #999999;
            }





            #sidebar {
                background-color: #000;
                width: 200px;
                position: absolute;
                top: 0;
                left: 0;
                min-height: 100%;
            }
                 #sidebar .nav-pills>li>a {
                    border-radius: 0;
                    color: #fff;
                    border-left: 3px solid #000;
                }
                #sidebar .nav>li>a:focus,
                #sidebar .nav>li>a:hover,
                #sidebar .nav-pills>li.active>a,
                #sidebar .nav-pills>li.active>a:focus,
                #sidebar .nav-pills>li.active>a:hover {
                    background-color: #000;
                    border-left: 3px solid #1F2A44;
                }
                #sidebar .fa {
/*                    margin-top: 4px;*/
                }
                .icon-ring {
                    width: 24px;
                    height: 24px;
                    border-radius: 50%;
                    border: 2px solid grey;
                    color: white;
                    display: inline-table;
                    text-align: center;
                    background: grey;
                    margin-right: 10px;
                }
            #wrapper {
                padding-left: 200px;
                min-height: 100%;
                position: relative;
                overflow: hidden;
            }
            #main {
                padding: 30px 16px 80px 16px;
            }
            #filter-buttons,
            #search {
                margin-top: 20px;
            }
            .filter {
                margin-right: 10px;
            }
            .filter .checkbox {
                margin-top: 18px;
            }

            .well h2,
            .well h3,
            .well h4,
            .panel-body h2,
            .panel-body h3,
            .panel-body h4 {
                margin-top: 0;
                padding-top: 0;
            }
        </style>
        @stack('after-styles')
    </head>
    <body>
        <div id="wrapper">
            <div id="sidebar">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{ route(config('laraman.route.prefix') . '.dashboard') }}">Laraboard</a>
                        </div>
                    </div>
                </nav>
                <ul class="nav nav-pills nav-stacked">
                    @each(config('laraboard-admin.view.hintpath') . '::blocks.nav', config('laraboard-admin.nav'), 'nav')
                    <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                </ul>
            </div>
            <div id="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col col-xs-12">
                            @include(config('laraman.view.hintpath') . '::blocks.flash')
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @stack('before-scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        @stack('after-scripts')
    </body>
</html>
