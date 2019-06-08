@extends('layouts.master')

@section('content')
    <div class="col-md-6" style="background-color: white;">
        <h3> Hospitals Near you </h3>
        <div class="panel-group">
            @if(@$nearerHospitals)

                @foreach(@$nearerHospitals as $key=>$item)

                    <div class="panel panel-info">
                        <div class="panel-heading">{{@$item->name}}</div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-responsive">
                                <tbody>
                                <tr>
                                    <td><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;Address </td>
                                    <td>{{@$item->address}}</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Contact No. </td>
                                    <td>{{@$item->contact_no}}</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;Email</td>
                                    <td>{{@$item->email}}</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Web site </td>
                                    <td>{{@$item->website}}</td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-user-md" aria-hidden="true"></i>&nbsp;Avialable Doctors</td>
                                    <td><a href="/results/hospital?id={{@$item->id}}">Click here</a> to see available doctors. </td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="text-success" style="font-family: sans-serif; font-weight: bolder; font-size: 14px;">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                Less than <b><u>{{@$key}} KM</u></b> away.</p>
                        </div>
                    </div>

                @endforeach
            @else
                <p class="alert-warning">No hospitals found according to your query</p>
            @endif

        </div>
    </div>
@endsection
