@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Create Post</h1>
@stop

@section('content')
<form action="{{route('post.store')}}" method="POST">
    {{csrf_field()}}
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="attachment">Attachment</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="attachment" class="custom-file-input" id="attachment">
                            <label class="custom-file-label" for="attachment">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">Select</option>
                        @foreach($users ?? [] as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        @foreach((new App\Models\Post())->types as $type)
                            <option value="{{$type}}">{{$type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="publish_at">Publish at</label>
                    <input name="publish_at" id="publish_at" type="datetime-local" class="form-control">
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
