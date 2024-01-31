@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Events</h1>
@endsection

@section('content')

    <div class="card card-primary">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>leader</th>
                        <th>cost</th>
                        <th>start</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($events ?? [] as $key => $event)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->leader->name}}</td>
                        <td>{{$event->event_fees}}</td>
                        <td>{{$event->start_datet}}</td>
                        <td>
                            <div class="row">
                                <button class="btn btn-sm btn-primary mr-1">
                                    <a href="{{route('admin.event.show', $event->id)}}">
                                     <span class="fa fa-eye" style="color: black"></span>
                                    </a>
                                </button>
                                <button class="btn btn-sm btn-success mr-1">
                                    <a href="{{route('admin.event.edit', $event->id)}}">
                                     <span class="fa fa-edit" style="color: black"></span>
                                    </a>
                                </button>
                                <div class="mx-1">
                               
                                <button class="btn btn-sm btn-danger mr-1">
                                    <a href="{{route('admin.event.destroy', $event->id)}}"> 
                                     <span class="fa fa-trash" style="color: black"></span>
                                    </a>
                                </button>
                                {{ Form::close() }}
                            </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection



