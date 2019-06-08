@extends('layouts.hospital-layout')

@section('content')
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 10px;">
                        <a style="margin-left: 3px;" role="button" href="/doctor-import" class="pull-right btn-md btn btn-info" >Import Excel File</a>
                        <a role="button" href="/hospital/doctor/create" class="pull-right btn-md btn btn-primary" >Add Doctor</a>
                    </div>

                    <div class="col-lg-12">
                        <div>
                            <table class="table table-responsive table-striped table-bordered">
                                <tr>
                                    <th>SN</th>
                                    <th>Full Name</th>
                                    <th>Specialist </th>
                                    <th> Days / Date </th>
                                    <th>Time</th>
                                    <th>Edit/Delete/View</th>
                                </tr>

                                <?php $i=1 ?>
                                @foreach($doctors as $doctor)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! @$doctor->first_name !!} {!! @$doctor->last_name !!}</td>
                                        <td> {{@$doctor->specialist->name}} </td>
                                        <td> {!! @$doctor->days !!}</td>
                                        <td>{!! @$doctor->to !!} to {!! $doctor->from !!} </td>
                                        <td>
                                            <a href="/hospital/doctor/edit/{{@$doctor->id}}" role="button" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="/hospital/doctor/delete/{{@$doctor->id}}" role="button" class="btn btn-sm btn-danger">Delete</a>&nbsp;

                                            {{--<a href="/doctor/profile" role="button" class="btn btn-success btn-sm">View</a>--}}
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                @endforeach
                            </table>
                        </div> <!-- table div ends here -->
                        <ul class="pagination pagination-md pull-right">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                        </ul>
                    </div>
                </div>

@endsection