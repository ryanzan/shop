@extends('layouts.hospital-layout')

@section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <h3><u>Basic Information about the Hospital</u></h3>
                        </div>
                        <form class="form" action="/hospital/configuration/store" method="POST">
                            {{ csrf_field() }}
                            <input hidden id="latitude" name="latitude">
                            <input hidden id="longitude" name="longitude">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Hospital's Name </label>
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
                                    <label for="contact_no">Contact Number </label>
                                    <input type="text" name="contact_no" class="form-control"
                                           value="{{@$configuration->contact_no}}">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website </label>
                                    <input type="text" name="website" class="form-control"
                                           value="{{@$configuration->website}}">
                                </div>
                                <div class="form-group">
                                    <label for="beds_no">Ambulance Contact Number</label>
                                    <input type="text" name="ambulance_no" class="form-control"
                                           value="{{@$configuration->ambulance_no}}">
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
                                <div class="form-group">
                                    <label for="beds_no">Total Number of Beds</label>
                                    <input type="text" name="beds_no" class="form-control"
                                           value="{{@$configuration->beds_no}}">
                                </div>
                                <div class="form-group">
                                    <label for="beds_no">Emergency Contact Number</label>
                                    <input type="text" name="emergency_no" class="form-control"
                                           value="{{@$configuration->emergency_no}}">
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