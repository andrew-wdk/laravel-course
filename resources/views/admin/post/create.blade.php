@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Create Post</h1>
@stop

@section('content')
<form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{old('title')}}" required
                    >
                    @error('title')
                        <div class="text-danger"> {{$errors->first('title')}} </div>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" class="form-control" rows="3" required>{{old('body')}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="attachment">Attachment</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="attachment" class="custom-file-input" id="attachment">
                            <label class="custom-file-label" for="attachment">Choose file</label>
                        </div>
                    </div>
                    @error('attachment')
                        <div class="text-danger"> {{$errors->first('attachment')}} </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">Select</option>
                        @foreach($users ?? [] as $user)
                            <option value="{{$user->id}}" @selected(old('user_id') == $user->id)>
                                {{$user->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-danger"> {{$errors->first('user_id')}} </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach(App\Models\Post::STATUSES as $status)
                            <option value="{{$status}}" @selected(old('status') == $status)>
                                {{$status}}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class="text-danger"> {{$errors->first('status')}} </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        @foreach(App\Models\Post::TYPES as $type)
                            <option value="{{$type}}" @selected(old('type', $post->type) == $type)>
                                {{$type}}
                            </option>
                        @endforeach
                    </select>
                    @error('type')
                        <div class="text-danger"> {{$errors->first('type')}} </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="publish_at">Publish at</label>
                    <input name="publish_at" id="publish_at" type="datetime-local" class="form-control">
                    @error('publish_at')
                        <div class="text-danger"> {{$errors->first('publish_at')}} </div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="image">image</label>
                    <input name="image" id="image" type="file" class="form-control">
                    @error('image')
                        <div class="text-danger"> {{$errors->first('image')}} </div>
                    @enderror
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
