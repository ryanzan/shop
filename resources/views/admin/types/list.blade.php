@extends('layouts.admin-layout')

@section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <div class="col-md-12">
                                <h2>Manage Clothes Types</h2>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <br>
                            </div>
                            <form class="form" action="/admin/clothes-type" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control"
                                           placeholder="Clothes Type Name">
                                    @if($errors)
                                        @foreach ($errors->all() as $error)
                                            <li class="alert alert-danger">{{ $error }}</li>
                                        @endforeach
                                        @endif
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="description"
                                              placeholder="Description"></textarea>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-md btn-primary">Add</button>
                                </div>
                            </form>
                            <br>
                            <table class="table table-striped table-bordered table-hover"
                                   id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                   role="grid">
                                <thead>
                                <tr role="row">
                                    <th style="width:10px;">SN
                                    </th>
                                    <th style="width: 45px;">Name
                                    </th>
                                    <th style="width: 45px;">Operations
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1 ?>
                                @foreach(@$types  as $type)
                                    <tr>
                                        <td style="width:10px;">{{$i}}
                                        </td>
                                        <td style="width: 45px;">{{@$type->name}}
                                        </td>
                                        <td style="width: 45px;">

                                            <a href="/admin/clothes-type/{{@$type->id}}/edit" class="btn btn-xs btn-primary"><i
                                                        class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</a>
                                            <div class="delete" style="display: inline">
                                                <form method="post"
                                                      action="/admin/clothes-type/{{$type->id}}"
                                                      style="display:inline;">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button type="submit" class="btnDelete btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $i++ ?>
                                @endforeach
                            </table>
                            {!! $types->links() !!}
                        </div>
                    </div>

                </div>

            </div>
@endsection
