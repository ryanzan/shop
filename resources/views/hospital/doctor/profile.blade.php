@extends('layouts.hospital-layout')

@section('content')
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#basic" aria-controls="home" role="tab" data-toggle="tab">Basic
                    Information</a></li>
            <li role="presentation"><a href="#personal" aria-controls="profile" role="tab" data-toggle="tab">Personal
                    Information</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Academics
                    Info and Documents</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content" style="padding-top:20px;">
            <div role="tabpanel" class="tab-pane active" id="basic">
                <div class="col-lg-12">
                    @include('hospital.doctor.partials.basic_info')
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="personal">
                <div class="col-lg-12">
                    @include('hospital.doctor.partials.personal_info')
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">...</div>
            <div role="tabpanel" class="tab-pane" id="settings">...</div>
        </div>
    </div>
@endsection