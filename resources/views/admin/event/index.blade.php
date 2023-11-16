@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Posts</h1>
@endsection

@section('content')

    <div class="card card-primary">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>start-date</th>
                        <th>end-date</th>
                        <th>departure-time </th>
                        <th>return-time</th>
                        <th>Leader-ID</th>
                        <th>Location</th>
                        <th>Notes</th>
                        <th>Event-fees</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($events ?? [] as $key => $event)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$event->start_date}}</td>
                        <td>{{$event->end_date}}</td>
                        <td>{{$event->departure_time}}</td>
                        <td>{{$event->return_time}}</td>
                        <td>{{$event->leader_id}}</td>
                        <td>{{$event->event_fees}}</td>
                        <td>{{$event->location}}</td>
                        <td>{{$event->notes}}</td>
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



