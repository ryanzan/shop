@extends('layouts.hospital-layout')

@section('content')
                <div class="row">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic Information</a></li>
                        {{--<li role="presentation"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Personal Information</a></li>--}}
                        {{--<li role="presentation"><a href="#docs" aria-controls="docs" role="tab" data-toggle="tab">Academics Info and Documents</a></li>--}}
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content" style="padding-top:20px;">
                        <div role="tabpanel" class="tab-pane active" id="basic">
                            <div class="col-lg-12">
                                <form class="form" method="post" action="/hospital/doctor/update">
                                    {!! csrf_field() !!}
                                    <input type="hidden" value="{{$doctor->id}}" name="id">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" class="form-control" value="{{@$doctor->first_name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="designation">Designation</label>
                                            <select class="form-control" name="specialist_id">
                                                <option value="">--Select Designation--</option>
                                                @foreach(@$specialists as $specialist)
                                                    <option value="{{$specialist->id}}" {{@$doctor->specialist->id==$specialist->id?'selected':''}}>{{$specialist->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="from">Time</label>
                                            <div class="col-md-12" style="margin-left:-30px;">
                                                <div class="col-md-6">
                                                    <input type="text" name="to" class="form-control" placeholder="From" value="{{@$doctor->to}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="from" class="form-control" placeholder="To" value="{{@$doctor->from}}">
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="qualification">Qualifications</label>
                                            <input type="text" name="qualification" class="form-control" value="{{@$doctor->qualification}}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" value="{{@$doctor->last_name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_numb">NMC Number</label>
                                            <input type="text" name="nmc_no" class="form-control" value="{{@$doctor->nmc_no}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="days">Available Days</label>
                                            <input type="text" name="days" class="form-control" value="{{@$doctor->days}}">
                                        </div>

                                    </div>

                                    <div class="col-lg-12">
                                        <button class="btn btn-primary btn-md">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection