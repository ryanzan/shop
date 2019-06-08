@extends('layouts.admin-layout')

@section('content')
    <div class="row">
        <div class="page-header">
            <h3>Manage Users</h3>
        </div>
        <div class="col-md-12">
            <a role="button" href="/admin/user/create" class="btn btn-sm btn-primary pull-right">Add User</a>
        </div>
        <div class="col-md-12">
        <table class="table table-bordered table-responsive">
            <thead>
            <th width="10%">SN</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th width="20%">Operations</th>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            @foreach(@$users as $user)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                       {{ $user->role ? $user->role->name : '' }}
                    </td>
                    <td>
                        <a href="/admin/user/{{$user->id}}/edit" class="btn btn-xs btn-primary"><i
                                    class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit</a>
                        <div class="delete" style="display: inline">
                            <form method="post"
                                  action="/admin/user/{{$user->id}}"
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
                <?php $i++?>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
