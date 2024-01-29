@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Meetings</h1>
@endsection

@section('content')

    <div class="card card-primary">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>meeting_time</th>
                        <th>meeting_date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($meetings ?? [] as $key => $meeting)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$meeting->name}}</td>
                        <td>{{$meeting->meeting_time}}</td>
                        <td>{{$meeting->meeting_date}}</td>
                        <td>
                            <div class="row">
                                <button class="btn btn-sm btn-primary mr-1">
                                    <span class="fa fa-eye"></span>
                                </button>
                                <button class="btn btn-sm btn-success mr-1">
                                    <span class="fa fa-edit"></span>
                                </button>
                                {{ Form::open(['route' => ['admin.meeting.destroy',$meeting->id] ,'method' => 'DELETE' ,'class' => 'delete-form']) }}
                                <button class="btn btn-sm btn-danger mr-1">
                                    <span class="fa fa-trash"></span>
                                </button>
                                {{ Form::close() }}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection



