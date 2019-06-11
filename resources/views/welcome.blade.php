<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">

    <title>CSRS</title>
    <link rel="stylesheet" href="/front/css/homepage.css">


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

        <form class="form">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="sel1">Clothes Type</label>
                    <select class="form-control " id="sel1">
                        <option>T-shirt</option>
                        <option>Paint</option>
                        <option>Shirt</option>
                        <option>Sweater</option>
                        <option>Jacket</option>


                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="sel1">Price</label>
                    <select class="form-control " id="sel1">
                        <option>0-500</option>
                        <option>500-1000</option>
                        <option>1000-1500</option>
                        <option>1500-2000</option>
                        <option>2000-2500</option>
                        <option>2500-3000</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="sel1">Age Group</label>
                    <select class="form-control " id="sel1">
                        <option>kids</option>
                        <option>Teen</option>
                        <option>Adult</option>
                        <option>Young</option>
                        <option>Old</option>

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="sel1">Material</label>
                    <select class="form-control  " id="sel1">
                        <option>Cotton</option>
                        <option>Nylon</option>
                        <option>Jeans</option>
                        <option>polyester</option>
                        <option>ciffon</option>
                        <option>silk</option>

                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="sel1">Size</label>
                    <select class="form-control" id="sel1">
                        <option>XXXL</option>
                        <option>XXL</option>
                        <option>XL</option>
                        <option>L</option>
                        <option>M</option>
                        <option>S</option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Gender</label>
                    <br>
                    <input type="radio" name="gender">Male &nbsp; &nbsp;
                    <input type="radio" name="gender">female
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <button class="btn btn-primary btn-block">Search</button>
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
