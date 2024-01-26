@extends('adminlte::page')

@section('title', 'users')

@section('content_header')
    <h1>Users List</h1>
@endsection

@section('content')

    <div class="card card-primary">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
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
                                    <span class="fa fa-eye"></span>
                                </button>
                                <button class="btn btn-sm btn-success mr-1">
                                    <span class="fa fa-edit"></span>
                                </button>
                                <button class="btn btn-sm btn-danger mr-1">
                                    <span class="fa fa-trash"></span>
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


