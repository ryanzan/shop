<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

    <title>CSRS</title>
    <link rel="stylesheet" href="/front/css/homepage.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?key=AIzaSyCtvuvt8CfExKZyli98d4FUeoQtQLGySyU&libraries=places'></script>
    <script src="/assets/location-picker/locationpicker.jquery.js"></script>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand " href="#">CSRS</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>

<div class="container">


    <div class="row" style="background-color: white; padding: 10px;">

        <form class="form" method="post" action="/search">
            {!! csrf_field() !!}
            <input hidden id="latitude" name="latitude">
            <input hidden id="longitude" name="longitude">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="sel1">Clothes Type</label>
                    <select class="form-control " id="sel1" name="type">
                        @if($types)
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{@$type->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="sel1">Price</label>
                    <select class="form-control " id="sel1" name="price">
                        <option value="c">below 1000</option>
                        <option value="m">1000-5000</option>
                        <option value="e">above 5000</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="sel1">Age Group</label>
                    <select class="form-control" name="age_group">
                        @foreach($ages as $age)
                            <option value="{{$age}}">{{$age}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                        @foreach($genders as $gender)
                            <option value="{{$gender}}">{{$gender}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Size</label>
                    <select class="form-control" name="size">
                        @foreach($sizes as $size)
                            <option value="{{$size}}">{{$size}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Color</label>
                    <input type="text" name="color" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Material</label>
                    <input type="text" name="material" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Within</label>
                    <select class="form-control" name="within" id="within">
                        <option value="1">---Within 1 KM---</option>
                        <option value="5">---Within 5 KM---</option>
                        <option value="10">---Within 10 KM---</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Please click the button below to get your location </label> <br>
                    <a role="button" data-target="#us6-dialog" data-toggle="modal"
                       class="btn btn-primary btn-md " name="location"
                       style="height:35px; font-size:15px;">Get your
                        location
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Your Location</label>
                        <input type="text" id="location" name="address" class="form-control"
                               readonly>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                        @if(Session::has('message'))
                            <div class="alert alert-danger dismissible">
                                {{Session::get('message')}}
                            </div>
                        @endif

                </div>
            </div>
        </form>

    </div>
    <div class="row white-row">
        @if($shops)
            @foreach($shops as $shop)
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            {{@$shop->name}}
                        </div>
                        <div class="panel-body text-center">
                            <img src="/uploads/shops/{{@$shop->image}}" alt="" class="img-circle" width="140">
                        </div>
                        <div class="panel-footer">
                            {{@$shop->address}}, 01440345
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>

</body>

</html>
@include('partials.map-api')

