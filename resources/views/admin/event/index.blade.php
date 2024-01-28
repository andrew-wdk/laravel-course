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



