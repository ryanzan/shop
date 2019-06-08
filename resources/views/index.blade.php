@extends('layouts.master')

@section('content')
    <form class="form-group" method="post" action="/results">
        {!! csrf_field() !!}
        <input hidden id="latitude" name="latitude">
        <input hidden id="longitude" name="longitude">
        <div class="col-lg-10 col-md-10" id="form">
            <div class="col-md-12">
                <div class="col-md-6">
                    <input type="text" name="disease" placeholder="Enter your disease name"
                           class="form-control form-input">
                </div>
                <div class="col-md-6">
                    <a id="emergency" role="button" class="btn btn-md btn-danger col-md-12 emergency img-responsive"
                       data-toggle="tooltip" data-placement="bottom" title="Please Select you location by clicking 'Get Your Location' button"
                       style="font-size: 20px;"><b>
                            Emergency?</b></a>
                </div>
            </div>
            <div class="col-md-12"><br></div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <a role="button" data-target="#us6-dialog" data-toggle="modal"
                       class="btn btn-primary btn-md form-control" name="location"
                       style="height: 50px; font-size: 22px;">Get your
                        location
                    </a>
                </div>
                <div class="col-md-6" id="location-display">
                    <input type="text" name="address" id="location" placeholder="You Address"
                           class="form-control form-input" readonly>
                </div>
            </div>

            <div class="col-md-12"><br></div>
            <div class="col-md-12">
                <div class="col-md-4">
                    <select class="form-control" name="gender" id="gender" style="height: 50px;">
                        <option value="">-Select gender-</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="age" id="age" style="height: 50px;">
                        <option value="">-Select age group-</option>
                        <option value="children">Children (0-10)</option>
                        <option value="young">Young (10-20)</option>
                        <option value="adult">Adult (20-40)</option>
                        <option value="above">Above 40</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="condition" id="service_type"
                            style="height: 50px;">
                        <option value="">-Select case-</option>
                        <option value="1">Normal</option>
                        <option value="2">Urgent</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12"><br></div>
            <div class="col-md-12">
                <div class="col-md-4">
                    <select class="form-control" name="within" id="within" style="height: 50px;">
                        <option value="1">---Within 1 KM---</option>
                        <option value="5">---Within 5 KM---</option>
                        <option value="10">---Within 10 KM---</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="size" id="size" style="height: 50px;">
                        <option value="">-Hospital Size-</option>
                        <option value="1">Small(up to 15 beds)</option>
                        <option value="2">Medium(16 to 50 beds)</option>
                        <option value="3">Medium Large(51 to 100 beds)</option>
                        <option value="4">Large(more than 100 beds)</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12"><br><br></div>
            <div class="col-md-12">
                <div class="col-md-2">
                    <button class="btn btn-lg btn-success" name="location" type="submit">
                        Search Hospital &nbsp; <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
                <div class="col-md-6 pull-right">
                    @if(Session::has('message'))
                        <div class="alert alert-danger dismissible">
                            {{Session::get('message')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </form>
    <div class="col-md-12"><br>
    </div>
    @include('partials.map-api')
@endsection
@section('homePageContent')
    <div class="container-fluid" style="background-color: #ffb3ed; padding:25px; ">
        <div class="container">
            <div class="col-md-3">
                <button type="button" id="hospital" class="btn btn-default btn-warning btn-find">Hospitals
                    <i class="fa fa-h-square  fa-5x " aria-hidden="true"></i>
                </button>
            </div>
            <div class="col-md-3">
                <button type="button" id="ambulance" class="btn btn-default btn-primary btn-find">Ambulances
                    <i class="fa fa-ambulance  fa-5x fa-square" aria-hidden="true"></i>
                </button>
            </div>
            <div class="col-md-3">
                <a role="button" id="doctor" class="btn btn-default btn-primary btn-find">Doctors
                    <i class="fa fa-stethoscope  fa-5x " aria-hidden="true"></i>
                </a>
            </div>
            <div class="col-md-3">
                <a role="button" class="btn btn-default btn-primary btn-find">Emergency Contacts
                    <i class="fa fa-phone  fa-5x " aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container" id="hospital-list" style=" padding:25px; ">
        @include('partials.hospital-list')
    </div>
    <div class="container" id="ambulance-list" style=" padding:25px; ">
        @include('partials.ambulance-list')
    </div>
    <div class="container" id="doctor-list" style=" padding:25px; ">
        @include('partials.doctor-list')
    </div>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('#ambulance-list').hide();
            $('#doctor-list').hide();
            $('#hospital').click(function () {
                $('#ambulance-list').hide();
                $('#doctor-list').hide();
                $('#hospital-list').show();
            });
            $('#ambulance').click(function () {
                $('#hospital-list').hide();
                $('#doctor-list').hide();
                $('#ambulance-list').show();
            });
            $('#doctor').click(function () {
                $('#hospital-list').hide();
                $('#ambulance-list').hide();
                $('#doctor-list').show();
            });
            $('#emergency').click(function () {
                var latitude= $('#latitude').val();
                var longitude = $('#longitude').val();
                window.location.href = "/emergency?lat="+latitude+"&long="+longitude;
            });
        });
    </script>
@endsection
