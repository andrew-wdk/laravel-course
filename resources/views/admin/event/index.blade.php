@extends('adminlte::page')

@section('title', 'Posts')

@section('content')

    <div class="card card-primary">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Start date</th>
                        <th>end-date</th>
                        <th>departure-time</th>
                        <th>return-time</th>
                        <th>Event Fees</th>
                        <th>Location</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($events ?? [] as $key => $event)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$event->start_date}}</td>
                        <td>{{$event->end-date}}</td>
                        <td>{{$event->deptime}}</td>
                        <td>{{$event->returntime}}</td>
                        <td>{{$event->fees}}</td>
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
