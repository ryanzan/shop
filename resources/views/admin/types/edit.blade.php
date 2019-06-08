@extends('layouts.admin-layout')

@section('content')

    <div class="page-header">
        <div class="col-lg-12">
            <h3>Edit Clothes Type</h3>
        </div>
    </div>
    <form class="form" action="/admin/clothes-type/{{$type->id}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">

        <div class="form-group">
            <input type="text" name="name" class="form-control"
                   value="{{@$type->name}}">
            @if($errors)
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            @endif
        </div>
        <div class="form-group">
                                    <textarea class="form-control" rows="3" name="description"
                                             > {{@$type->description}}</textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-md btn-primary">Update</button>
        </div>
    </form>
@endsection
