@extends('layouts.admin-layout')

@section('content')
                    <div class="panel panel-primary">
                        <div class="panel-heading">{{@$disease->name}}</div>
                        <div class="panel-body">
                            {!! str_replace('.', '.</br>', @$disease->description)  !!}
                        </div>
                    </div>
            <a role="button" class="btn  btn-default btn-primary"href="/admin/disease/edit?id={{@$disease->id}}">Edit</a>
    @endsection