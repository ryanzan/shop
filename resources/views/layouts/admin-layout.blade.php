<!DOCTYPE html>
<html lang="en">
<head>
    <title>SRS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/style/simple-sidebar.css">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/style/navbar-fixed-side.css">
    <link rel="stylesheet" href="/assets/style/homepage.css">
    <link rel="stylesheet" href="/assets/style/doctor-profile.css">

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?key=AIzaSyCtvuvt8CfExKZyli98d4FUeoQtQLGySyU&libraries=places'></script>
    <script src="/assets/location-picker/locationpicker.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        .navbar-inverse {background-color: #ffb3ed;}
        .navbar-inverse .navbar-nav > .active > a,
        .navbar-inverse .navbar-nav > .active > a:hover,
        .navbar-inverse .navbar-nav > .active > a:focus {
            color:green;
            background-color:#FFF;
        }
        .navbar-inverse .navbar-brand {
            color: #000099;
        }
        .navbar-inverse .navbar-nav>li>a {
            color: #000099;
        }
        #form-content{
            padding:40px 0px;
            /*background-image:url('background.jpg') ;*/
            background-repeat: no-repeat;
            background-size: 100% auto;
        }
        .btn-find{
            width:210px;
        }
    </style>
</head>
<body style="height:1500px">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">SRS </a>
        </div>
        <ul class="nav navbar-nav pull-right">
            <a role="button" href="/logout" class="btn btn-default navbar-btn">
                <i class="fa fa-sign-out" aria-hidden="true"></i></span>
                &nbsp;Sign out</a>
        </ul>
        <!--  </div> -->
    </div>
</nav>
<div class="container-fluid" style="margin-top: 50px;">
    <div class="row">
        <div class="col-sm-3 col-lg-2">
            <nav class="navbar navbar-default navbar-fixed-side">
                <!-- normal collapsible navbar markup -->
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class=""><a href="/admin">Home</a></li>

                            <li>
                                <a href="/admin/clothes-type"><span class="glyphicon glyphicon-option-horizontal"></span>&nbsp;Clothes Types</a>
                            </li>
                            <li>
                                <a href="/admin/shops"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Shops</a>
                            </li>
                            <li>
                                <a href="/admin/user"><span class="glyphicon glyphicon-user"></span>&nbsp;Users</a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-cog"></span>&nbsp;Setting</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-sm-9 col-lg-10" style="padding: 20px;" >
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
