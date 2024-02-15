@extends('adminlte::page')

@section('title', 'visits')

@section('content_header')
    <h1>Visits</h1>
@endsection

@section('content')

    <div class="card card-primary">
        <div class="card-body table-responsive">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>servant</th>
                        <th>student</th>
                        <th>date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($visits ?? [] as $key => $visit)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$visit->servant->name}}</td>
                        <td>{{$visit->student->name}}</td>
                        <td>{{$visit->date}}</td>
                        <td>
                            <div class="row">
                                <button class="btn btn-sm btn-primary mr-1">
                                    <a href="{{route('admin.visit.show', $visit->id)}}">
                                     <span class="fa fa-eye" style="color: black"></span>
                                    </a>
                                </button>
                                <button class="btn btn-sm btn-success mr-1">
                                    <a href="{{route('admin.visit.edit', $visit->id)}}">
                                        <span class="fa fa-edit" style="color: black"></span>
                                    </a>
                                </button>
                                <button class="btn btn-sm btn-danger mr-1">
                                    <a href="{{route('admin.visit.destroy', $visit->id)}}">
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

