@extends('layouts.hospital-layout')

@section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <h3><u>Basic Information about the Hospital</u></h3>
                        </div>
                        <div class="col-lg-12">
                            <table class="table table-bordered table-responsive table-striped">
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{@$configuration->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{@$configuration->email}}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{@$configuration->address}}</td>
                                </tr>
                                <tr>
                                    <td>Contact Number</td>
                                    <td>{{@$configuration->contact_no}}</td>
                                </tr>
                                <tr>
                                    <td>Total Number of Beds</td>
                                    <td>{{@$configuration->beds_no}}</td>
                                </tr>
                                <tr>
                                    <td>Emergency Contact Number</td>
                                    <td>{{@$configuration->emergency_no}}</td>
                                </tr>
                                <tr>
                                    <td>Ambulance Number</td>
                                    <td>{{@$configuration->ambulance_no}}</td>
                                </tr>
                                <tr>
                                    <td>Website</td>
                                    <td>{{@$configuration->website}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-md-6" style="padding-left: 0%">
                                <a role="button" class="btn btn-md btn-primary" href="/hospital/configuration/edit">Edit Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
@endsection