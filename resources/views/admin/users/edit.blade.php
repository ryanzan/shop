@extends('layouts.admin-layout')

@section('content')
                <div class="row">
                    <div class="page-header">
                        <h3>Update User <i>{{$user->name}}</i></h3>
                    </div>
                    <div class="col-md-6">
                        <form action="/admin/user/{{$user->id}}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" value="{{$user->email}}" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                               <select class="form-control" name="role_id">
                                   @foreach($roles as $key=>$value)
                                       <option value="{{$key}}" {{$user->role->id  ==  $key ? 'selected' : ''}}>{{$value}}</option>
                                       @endforeach
                               </select>
                            </div>
                            <button class="btn btn-primary btn-md">Update</button>
                        </form>
                    </div>
                </div>
@endsection
