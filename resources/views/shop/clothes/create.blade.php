@extends('layouts.shop-layout')

@section('content')
    <div class="row">
        <div class="page-header">
            <div class="col-lg-12">
                <h3>Add Clothes</h3>
            </div>
        </div>

        <form class="form" action="/shop/clothes" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Age Group</label>
                        <select class="form-control" name="age_group">
                            @foreach($ages as $age)
                                <option value="{{$age}}">{{$age}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" name="color" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Image </label>
                        <input type="file" id="location" name="image" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="clothes_type_id">
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            @foreach($genders as $gender)
                                <option value="{{$gender}}">{{$gender}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="material" placeholder="Materials Used"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
