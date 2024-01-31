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
                                    <a href="{{route('admin.meeting.show', $meeting->id)}}">
                                     <span class="fa fa-eye" style="color: black"></span>
                                    </a>
                                </button>
                                <button class="btn btn-sm btn-success mr-1">
                                    <a href="{{route('admin.meeting.edit', $meeting->id)}}">
                                     <span class="fa fa-edit" style="color: black"></span>
                                    </a>
                                </button>
                                <button class="btn btn-sm btn-danger mr-1">
                                    <a href="{{route('admin.meeting.destroy', $meeting->id)}}">
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



