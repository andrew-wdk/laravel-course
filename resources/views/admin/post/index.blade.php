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
                        <th>Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Publish at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts ?? [] as $key => $post)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->type}}</td>
                        <td>{{$post->status}}</td>
                        <td>{{$post->publish_at}}</td>
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


