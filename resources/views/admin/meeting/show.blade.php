@extends('adminlte::page')
@section('title', 'Meeting')


@section('content')

    <div class="card card-primary">
        <div class="card-body">
            <div class="form-group col-md-12">
                <label for="name">العنوان</label>
                <p type="text" name="name" id="name" class="form-control">{{old('title', $meeting->name)}}</p>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                <span class="fa fa-calendar-week"></span>
                    <label for="meeting-date" style="font-family:cursive;"> Meeting date</label>
                    <p type="date" name="meeting_date" id="meeting-date" class="form-control" >{{old('title', $meeting->meeting_date)}}</p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                <span class="fa fa-clock"></span>
                    <label for="Meeting-time" style="font-family:cursive;">Meeting time</label>
                    <p class="form-control" type="time" name="meeting_time" id="meeting-time"  >{{old('title', $meeting->meeting_time)}}</p>
                </div>
            </div>
                <div class="row">
                    <div class="form-group col-12">
                        <span class="fa fa-user"></span>
                            <label style="font-family:cursive;">Attendance</label><br>
                                @foreach($meeting->attendance as $attende)
                                    <input name="attendance[]" id="attendance{{$attende->id}}" class="form-check-label" type="checkbox" value="{{$attende->id}}" checked>
                                    <label for="attendance{{$attende->id}}">{{$attende->name}}</label><br>
                                @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

            <form action="{{ route('admin.meeting.index') }}" method="get">
                <button type="submit" class="btn btn-primary" style="border:none;
                border-radius:8px; font-family:cursive; margin-left:450px;">رجوع</button>
            </form>

        </div>
    </div>



@stop



