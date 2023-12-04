@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Edit Role</h1>
@stop

@section('content')
<form action="{{route('admin.role.update', $role->id)}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{old('name', $role->name)}}" required
                    >
                </div>

                <div class="form-group col-md-12">
                    <div class="d-flex justify-content-between">
                        <label class="required" for="permissions">Permissions</label>
                        <div class="ml-3">
                            <span class="btn btn-info btn-xs select-all rounded-pill px-2">select all</span>
                            <span class="btn btn-info btn-xs deselect-all rounded-pill px-2">unselect all</span>
                        </div>
                    </div>
                    <div class="row flex-col">
                        @foreach ($permissions as $id => $permission)
                            <div class="col-lg-4 col-md-6 my-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="permission_ids[]" value="{{$id}}" class='custom-control-input'
                                        @checked(in_array($id, old('permission_ids', $role_permission_ids)))
                                        {{-- {{ in_array($id, old('permission_ids', [])) ? 'checked' : '' }} --}}
                                        id="customCheck-{{$id}}">
                                    <label class="custom-control-label" for="customCheck-{{$id}}">{{$permission}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
        $('.select-all').click(function () {
            $('input[type="checkbox"]').prop('checked', true);
        })
        $('.deselect-all').click(function () {
            $('input[type="checkbox"]').prop('checked', false);
        })
    </script>
@stop
