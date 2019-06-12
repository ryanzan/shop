<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

    <title>CRS</title>
    <link rel="stylesheet" href="/front/css/result.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!--  -->

    <style>

    </style>

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
    <div class="row">
        <div class="col-md-6">
            <h3>Shop According To Your Query</h3>
            @if($finalShops)
            @foreach($finalShops as $shop)
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        {{$shop->name}}
                    </div>
                    <div class="panel-body text-center">
                        <table class="table table-bordered text-left">

                            <tbody>
                            <tr>
                                <td><i class="fas fa-address-card"></i> Address</td>
                                <td>{{$shop->address}}</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-phone-volume"></i> Contact NO</td>
                                <td>{{$shop->phone_number}}</td>

                            </tr>
                            <tr>
                                <td><i class="fas fa-envelope-open"></i> Email</td>
                                <td>{{$shop->email}}</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-globe-americas"></i> Websites</td>
                                <td>{{$shop->website}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <p class="text-success" style="font-family: sans-serif; font-weight: bolder; font-size: 14px;">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            Matches <b><u>{{number_format(@$shop->cosine,3)}}% </u></b> of your query. </p>
                    </div>
                </div>
            @endforeach
            @else
                <p class="alert-warning">No Shops found according to your query</p>
            @endif
        </div>

        <div class="col-md-6">
            <h3>Shop Near You</h3>
            @foreach($nearerShopss as $key=>$shop)
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        {{$shop->name}}
                    </div>
                    <div class="panel-body text-center">
                        <table class="table table-bordered text-left">

                            <tbody>
                            <tr>
                                <td><i class="fas fa-address-card"></i> Address</td>
                                <td>{{$shop->address}}</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-phone-volume"></i> Contact NO</td>
                                <td>{{$shop->phone_number}}</td>

                            </tr>
                            <tr>
                                <td><i class="fas fa-envelope-open"></i> Email</td>
                                <td>{{$shop->email}}</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-globe-americas"></i> Websites</td>
                                <td>{{$shop->website}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <p class="text-success" style="font-family: sans-serif; font-weight: bolder; font-size: 14px;">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            Less than <b><u>{{@$key}} KM</u></b> away.</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
</script>

</body>

</html>
