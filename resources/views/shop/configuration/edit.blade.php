@extends('layouts.shop-layout')

@section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <h3><u>Basic Information about the Hospital</u></h3>
                        </div>
                        <form class="form" action="/shop/configurations/store" method="POST">
                            {{ csrf_field() }}
                            <input hidden id="latitude" name="latitude">
                            <input hidden id="longitude" name="longitude">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Shop's Name </label>
                                    <input type="text" name="name" class="form-control"
                                           value="{{@$configuration->name}}">
                                </div>
                                <div class="form-group ">
                                    <label for="name">Please click the button below to get your location </label>
                                    <a role="button" data-target="#us6-dialog" data-toggle="modal"
                                       class="btn btn-primary btn-md " name="location"
                                       style="height:35px; font-size:15px;">Get your
                                        location
                                    </a>
                                </div>
                                <div class="form-group">
                                    <label for="contact_no">Phone Number </label>
                                    <input type="text" name="phone_number" class="form-control"
                                           value="{{@$configuration->phone_number}}">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website </label>
                                    <input type="text" name="website" class="form-control"
                                           value="{{@$configuration->website}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control"
                                           value="{{@$configuration->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Address</label>
                                    <input type="text" id="location" name="address" class="form-control"
                                           value="{{@$configuration->address}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-md btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
    @include('partials.map-api')

@endsection
