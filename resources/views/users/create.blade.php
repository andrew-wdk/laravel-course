@extends('adminlte::page')

@section('title', 'users')

@section('content_header')
    <h1>add user</h1>
@stop

@section('content')
<form action="{{url('user/create')}}" method="POST">
{{csrf_field()}}
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>


@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop
