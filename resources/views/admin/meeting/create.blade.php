@extends('adminlte::page')
@section('title', 'Meeting')


@section('content')
<form action="{{route('admin.meeting.store')}}" method="POST">
{{csrf_field()}}
    <div class="card card-primary">
        <div class="card-body">
            <div class="form-group col-md-12">
                <label for="name">الأسم</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                <span class="fa fa-calendar-week"></span>
                    <label for="meeting-date" style="font-family:cursive;"> Meeting date</label>
                    <input type="date" name="meeting_date" id="meeting-date" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                <span class="fa fa-clock"></span>
                    <label for="Meeting-time" style="font-family:cursive;">Meeting time</label>
                    <input class="form-control" type="time" name="meeting_time" id="meeting-time"  value="12:00" >
                </div>
            </div>
                <div class="row">
                <div class="form-group col-12">
                <span class="fa fa-user"></span>
                    <label style="font-family:cursive;">Attendance</label><br>
                        @foreach($users ?? [] as $user)
                            <input name="attendance[]" id="attendance{{$user->id}}" class="form-check-label" type="checkbox" value="{{$user->id}}">
                            <label for="attendance{{$user->id}}">{{$user->name}}</label><br>
                        @endforeach
                </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

            <button type="submit" class="btn btn-primary bg-black " id="button1" style="border:none;
             border-radius:8px; font-family:cursive; margin-left:450px;">
            Submit</button>
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

