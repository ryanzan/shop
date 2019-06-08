@extends('layouts.admin-layout')

@section('content')

    <div class="page-header">
        <div class="col-lg-12">
            <h3>Add Disease</h3>
        </div>
    </div>
    <form class="form" method="post" action="/admin/disease/store">
        {{ csrf_field() }}
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Disease Name</label>
                <input type="text" name="name" class="form-control ">
                @if($errors)
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Specialist</label>
                <select name="specialist_id" class="form-control">
                    <option value="">--Select specialist--</option>
                    @foreach($specialists as $specialist)
                        <option value="{{$specialist->id}}">{{$specialist->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <textarea class="form-control" rows="3" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <button class="btn btn-md btn-success">Add</button>
        </div>
    </form>
@endsection