@extends('layouts.admin-layout')

@section('content')
    <div class="row">
        <div class="page-header">
            <div class="col-lg-12">
                <h3>Diseases of <b>{{$specialist->name}}</b></h3>
            </div>
        </div>

        <form class="form" action="/admin/specialist/store-disease" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$specialist->id}}">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Disease Name">
                @if($errors)
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="description" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Add</button>
            </div>

        </form>

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
                        <a href="/admin/disease/edit/?id={{@$disease->id}}" class="btn btn-xs btn-primary"><i
                                    class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</a>
                        <a href="/admin/disease/delete/{{@$disease->id}}" class="btn btn-xs btn-danger"><i
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