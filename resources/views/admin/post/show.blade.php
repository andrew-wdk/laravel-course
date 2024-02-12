@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Create Post</h1>
@stop

@section('content')

    <div class="card card-primary">
        <div class="card-body">

            <div class="col-lg-4 my-1 form-Roles">
                <label class="form-label">Title</label>
                <p type="text" class="form-control " name="title" >{{old('title', $post->title)}}</p>
                @error('title')
                    <div class="text-danger"> {{$errors->first('title')}} </div>
                @enderror
            </div>
            
            
            <div>
              <span class="fa fa-comments" style="color:yellow;"></span>
              <label for="body" style="font-family:cursive;" id="body">body</label>
              <p name="body" id="body" class="form-control" rows="3">{{ old('body', $post->body) }}</p>
                    
            </div>

            <div class="form-group col-md-6">
                <label for="attachment">Attachment</label>
                @if(!empty($attachment))
                  <a href="{{ $attachment }}" target="_blank">Download Attachment</a>
                  @endif
            </div>

                <div class="form-group col-md-6">
                    <label for="user_id">User</label>
                    <p type="user_id" class="form-control " name="user_id" >{{old('user_id', $post->users->name)}}</p>
                    
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <p type="status" class="form-control " name="status" >{{old('status', $post->status)}}</p>
                    
                </div>
                <div class="form-group col-md-6">
                    <label for="type">Type</label>
                    <p type="type" class="form-control " name="type" >{{old('type', $post->type)}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="publish_at">Publish at</label>
                    <p type="publish_at" class="form-control " name="tpublish_at" >{{old('publish_at', $post->publish_at)}}</p>
                    <input name="publish_at" id="publish_at" type="datetime-local" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="image">image</label>
                    <img src="{{$imageUrl}}" class="img-fluid">
                </div>
           
        </div>
        <div class="card-footer">

            <form action="{{ route('admin.post.index') }}" method="get">
                <button type="submit" class="btn btn-primary">رجوع</button>
            </form>

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
