@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles</h1>
@endsection

@section('content')

    <div class="card card-primary" style="height:100%">
        <div class="card-body table-responsive">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($roles ?? [] as $key => $role)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            <div class="row">
                                <button class="btn btn-sm btn-primary mr-1">
                                    <a href="{{route('admin.role.show', $role->id)}}" class="text-white">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                </button>
                                <button class="btn btn-sm btn-success mr-1">
                                    <a href="{{route('admin.role.edit', $role->id)}}" class="text-white">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </button>
                                <form method="POST" action="{{route('admin.role.destroy', $role->id)}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-sm btn-danger mr-1">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </form>
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
{{-- <link href="https://cdn.datatables.net/v/dt/dt-1.13.7/datatables.min.css" rel="stylesheet"> --}}
@stop

@section('js')
{{-- <script src="https://cdn.datatables.net/v/dt/dt-1.13.7/datatables.min.js"></script> --}}

<script>
    {{-- $('#table').dataTable(); --}}
</script>
@stop

