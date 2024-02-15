@extends('adminlte::page')

@section('title', 'users')

@section('content_header')
    <h1>Users List</h1>
@endsection

@section('content')

    <div class="card card-primary">
        <div class="card-body table-responsive">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Username</th>
                        <th>الفصل</th>
                        <th>اخر افتقاد</th>
                        <th>الخادم المسئول</th>
                        <th>actions</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->choosing_section}}</td>
                        <td>{{$user->lastVisit?->date}}</td>
                        <td>{{$user->email_verified_at}}</td>
                        <td>
                            <div class="row">
                                <button class="btn btn-sm btn-primary mr-1">
                                    <a href="{{route('admin.user.show', $user->id)}}">
                                     <span class="fa fa-eye" style="color: black"></span>
                                    </a>
                                </button>
                                <button class="btn btn-sm btn-success mr-1">
                                    <a href="{{route('admin.user.edit', $user->id)}}">
                                     <span class="fa fa-edit" style="color: black"></span>
                                    </a>
                                </button>
                                <button class="btn btn-sm btn-danger mr-1">
                                    <a href="{{route('admin.event.destroy', $user->id)}}">
                                     <span class="fa fa-trash" style="color: black"></span>
                                    </a>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('css')
<link href="https://cdn.datatables.net/v/dt/dt-1.13.7/datatables.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://cdn.datatables.net/v/dt/dt-1.13.7/datatables.min.js"></script>

<script>
    $('#table').dataTable();
</script>
@stop
