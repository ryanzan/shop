@extends('layouts.hospital-layout')

@section('content')
    <div class="row">
        <div class="col-lg-12" style="margin-bottom: 10px;">
            {!! Form::open(['url' => 'doctor-import/import', 'files' => true]) !!}
            <div class="col-xs-12 col-lg-12">
                <div class="box-success box view-item col-xs-12 col-lg-12">
                    <div>
                        <h3><i class="glyphicon glyphicon-file"></i>Select File</h3>
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-5">
                            <a role="button" class="btn file-upload">
                                <input type="file" name="upload_doctor_file"></a>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-upload">Import Doctors</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /#page-content-wrapper -->

@endsection