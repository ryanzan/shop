@extends('layouts.shop-layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <div class="col-md-12">
                    <h2>Manage Clothes</h2>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-12">
                    <a role="button" href="/shop/clothes/create" class="btn btn-primary pull-right">Add</a>
                </div>
                <table class="table table-striped table-bordered table-hover"
                       id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                       role="grid">
                    <thead>
                    <tr role="row">
                        <th style="width:10px;">SN
                        </th>
                        <th style="width: 45px;">Name
                        </th>
                        <th style="width: 45px;">Type
                        </th>
                        <th style="width: 45px;">Image
                        </th>
                        <th style="width: 45px;">Operations
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    @foreach(@$clothes  as $item)
                        <tr>
                            <td style="width:10px;">{{$i}}
                            </td>
                            <td style="width: 45px;">{{@$item->name}}
                            </td>
                            <td style="width: 45px;">{{@$item->type->name}}
                            </td>
                            <td style="width:45px;"><img src="/uploads/clothes/{{@$item->image}}" width="50x">
                            </td>
                            <td style="width: 45px;">

                                <a href="/shop/clothes/{{@$item->id}}/edit" class="btn btn-xs btn-primary"><i
                                        class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</a>
                                <div class="delete" style="display: inline">
                                    <form method="post"
                                          action="/shop/clothes/{{$item->id}}"
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
                {!! $clothes->links() !!}
            </div>
        </div>

    </div>

    </div>
@endsection
