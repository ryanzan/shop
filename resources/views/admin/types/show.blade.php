@extends('layouts.admin-layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">{{@$specialist->name}}</div>
            <div class="panel-body">
                {!! str_replace('.', '.</br>', @$specialist->description)  !!}
            </div>
        </div>

        </div>
        <table class="table table-bordered table-responsive">
            <thead>
            <th>SN</th>
            <th>Disease Name</th>
            <th>Operations</th>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            @foreach(@$diseases as $disease)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$disease->name}}</td>
                    <td>
                        <a href="/admin/disease/edit?id={{@$disease->id}}" class="btn btn-xs btn-primary"><i
                                    class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</a>
                        <a href="/admin/disease/delete?id={{@$disease->id}}" class="btn btn-xs btn-danger"><i
                                    class="glyphicon glyphicon-trash"
                                    style="display: inline-block"></i>&nbsp;&nbsp;Delete</a>
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection