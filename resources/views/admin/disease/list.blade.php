@extends('layouts.admin-layout')

@section('content')
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="col-md-12">
            <h2>Manage Diseases</h2>
        </div>
        <div class="col-md-12">
            <hr>
        </div>

        <div class="col-md-12">
            <a href="/admin/disease/create" class="btn btn-md  btn-primary pull-right"><i
                        class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Add new disease</a>
        </div>
        <div class="col-md-12">
            <br>
        </div>
        <table class="table table-striped table-bordered table-hover"
               id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
            <thead>
            <tr role="row">
                <th style="width:10px;">SN
                </th>
                <th style="width: 20px;">Disease Name
                </th>
                <th style="width: 20px;">Specialist Name
                </th>
                <th style="width: 50px;">Operations
                </th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            @foreach(@$diseases as $disease)
                <tr>
                    <td style="width:10px;"> {{$i}}
                    </td>
                    <td style="width: 20px;">{{$disease->name}}
                    </td>
                    <td style="width: 20px;">{{$disease->specialist->name}}
                    </td>
                    <td style="width: 50px;">
                        <a href="/admin/disease/show?id={{@$disease->id}}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-search"></i>&nbsp;&nbsp;View</a>
                        <a href="/admin/disease/edit?id={{@$disease->id}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</a>
                        <a href="/admin/disease/delete/{{@$disease->id}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"
                                                                    style="display: inline-block"></i>&nbsp;&nbsp;Delete</a>
                    </td>
                </tr>
            <?php $i++ ?>
            @endforeach
        </table>
    {!! $diseases->links() !!}
    </div>
@endsection