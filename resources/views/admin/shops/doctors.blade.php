@extends('layouts.admin-layout')

@section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
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
                                            <a role="button" class="btn btn-sm btn-danger">Delete</a>&nbsp;
                                            <a href="/doctor/edit" role="button" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="/doctor/profile" role="button" class="btn btn-success btn-sm">View</a>
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