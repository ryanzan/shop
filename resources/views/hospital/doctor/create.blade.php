@extends('layouts.hospital-layout')

@section('content')
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab">Basic
                    Information</a></li>
            {{--<li role="presentation"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Personal Information</a></li>--}}
            {{--<li role="presentation"><a href="#docs" aria-controls="docs" role="tab" data-toggle="tab">Academics Info and Documents</a></li>--}}
        </ul>
        <!-- Tab panes -->
        <div class="tab-content" style="padding-top:20px;">
            <div role="tabpanel" class="tab-pane active" id="basic">
                <div class="col-lg-12">
                    <form class="form" method="post" action="/hospital/doctor/basic-store">
                        {!! csrf_field() !!}
                        @include('hospital.doctor.partials.basic_form')
                        <div class="col-lg-12">
                            <button class="btn btn-primary btn-md">Create</button>
                        </div>
                    </form>
                </div>
            </div>
            {{--<div role="tabpanel" class="tab-pane" id="personal">--}}
            {{--<div class="col-lg-12">--}}
            {{--<form class="form" method="post" action="/hospital/doctor/personal-update">--}}
            {{--{{ csrf_field() }}--}}
            {{--@include('hospital.doctor.partials.personal_form')--}}
            {{--<div class="col-lg-12">--}}
            {{--<button class="btn btn-primary btn-md">Update</button>--}}
            {{--</div>--}}
            {{--</form>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div role="tabpanel" class="tab-pane" id="docs">...</div>--}}
        </div>

    </div>
    <div class="row">
        @if($errors)
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        @endif
    </div>
@endsection