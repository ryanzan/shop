@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">{{@$hospital->name}}</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-responsive">
                    <tbody>
                    <tr>
                        <td><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;Address </td>
                        <td>{{@$hospital->address}}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Contact No. </td>
                        <td>{{@$hospital->contact_no}}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;Email</td>
                        <td>{{@$hospital->email}}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Web site </td>
                        <td>{{@$hospital->website}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="alert-success">Doctors available in {{@$hospital->name}} who treat <b>{{@$disease}}</b> problem </p>
        <table class="table table-responsive table-bordered table-striped"  style="background-color: white">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Specialist</th>
                    <th>Available Time</th>
                    <th>Available Days</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=0; ?>
            @if(@$doctors)
                @foreach($doctors as $doctor)
                    <?php $i++ ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ucwords(@$doctor->first_name).' '.ucwords(@$doctor->last_name)}}</td>
                        <td><a href="/results/hospital/specialist?id={{@$doctor->specialist->id}}">{{ucfirst(@$doctor->specialist->name)}}</a></td>
                        <td>{{@$doctor->to.' to '.@$doctor->from}}</td>
                        <td>{{ucwords(@$doctor->days)}}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @endsection