@extends('layouts.shop-layout')

@section('content')
    <div class="row">
        <div class="page-header">
            <div class="col-lg-12">
                <h3>Edit Clothes</h3>
            </div>
        </div>

        <form class="form" action="/shop/clothes/{{$clothes->id}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{$clothes->name}}">
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
                                <option
                                    value="{{$age}}" {{$clothes->age_group ==$age ? 'selected' : ''}}>{{$age}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" name="color" class="form-control" value="{{@$clothes->color}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image </label>
                        <input type="file" id="location" name="image">

                        @if($clothes->image)
                            <img src="/uploads/clothes/{{@$clothes->image}}" width="200px">
                        @else
                            <p>No Images Uploaded.</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="clothes_type_id">
                            @foreach($types as $type)
                                <option
                                    value="{{$type->id}}" {{$clothes->clothes_type_id ==$type->id ? 'selected' : ''}}>{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            @foreach($genders as $gender)
                                <option
                                    value="{{$gender}}" {{$clothes->gender ==$gender ? 'selected' : ''}}>{{$gender}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="{{$clothes->price}}">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="material"
                                  placeholder="Materials Used">v{{$clothes->material}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
