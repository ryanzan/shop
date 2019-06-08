@extends('layouts.admin-layout')

@section('content')
    <div class="row">
        <div class="page-header">
            <h3>Manage Shops</h3>
        </div>
        <div class="col-md-12">
            <a role="button" href="/admin/shops/create" class="btn btn-sm btn-primary pull-right">Add Shop</a>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-responsive">
                <thead>
                <th>SN</th>
                <th>Shop Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Operations</th>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @foreach($shops as  $shop)
                    <tr>
                        <td>{!! $i !!}</td>
                        <td>{!! $shop->name !!}</td>
                        <td>{!! $shop->address !!}</td>
                        <td>{!! $shop->email !!}</td>
                        <td>

                            <a href="/admin/shops/{{$shop->id}}/edit" class="btn btn-xs btn-primary"><i
                                    class="glyphicon glyphicon-edit"
                                    style="display: inline-block"></i>&nbsp;&nbsp;Edit</a>
                            <div class="delete" style="display: inline">
                                <form method="post"
                                      action="/admin/shops/{{$shop->id}}"
                                      style="display:inline;">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btnDelete btn btn-danger btn-xs"
                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
