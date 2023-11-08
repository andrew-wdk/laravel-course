@extends('adminlte::master')

@section('body')
        @include('head')
        @if(!empty($names))
            <ul>
                @foreach($names as $name)
                    <li @if($loop->first) style="background-color:grey"@endif> {{$name}} </li>
                @endforeach
            </ul>
        @else
            <p>the list is empty</p>
        @endif
@endsection

@yield()


@section('title')
    page title
@endsection


@push('js')
<script>console.log('main blade')</script>
@endpush
