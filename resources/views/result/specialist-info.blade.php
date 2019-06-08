@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">{{@$specialist->name}}</div>
            <div class="panel-body">
                <p>{{@$specialist->description}}</p>
            </div>
        </div>
        <p class="alert-success">{{@$specialist->name}} treats following diseases. </p>
        <table class="table table-responsive table-bordered table-striped"  style="background-color: white">
            <thead>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=0; ?>
            @if(@$specialist)
                @foreach($specialist->disease as $d)
                    <?php $i++ ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ucwords($d->name)}}</td>
                        <td>{{ucwords(@$d->description)}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection