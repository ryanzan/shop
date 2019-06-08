@extends('layouts.shop-layout')

@section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <h3><u>Basic Information about the Shop</u></h3>
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
                                    <td>Phone Number</td>
                                    <td>{{@$configuration->phone_number}}</td>
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
                                <a role="button" class="btn btn-md btn-primary" href="/shop/configurations/edit">Edit Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
