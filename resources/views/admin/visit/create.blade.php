@extends('adminlte::page')
@section('title', 'Visits')


@section('content')
<form action="{{route('admin.visit.store')}}" method="POST">
{{csrf_field()}}
    <div class="card card-primary">
        <div class="card-body">
               
            <div class="form-group col-12 col-md-6">
                <span class="fa fa-calendar-week"></span>
                    <label for="date " style="font-family:cursive;">date</label>
                    <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="row">
                    <div class="form-group col-md-6">
                        <span class="fa fa-user"></span>
                            <label for="servant_id" style="font-family:cursive;"> الخادم</label>
                            <select name="servant_id" id="servant_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($users ?? [] as $user)
                                @if($user->hasRole('servant'))
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                                @endforeach
                            </select>
                    </div>

                    <div class="form-group col-md-6">
                        <span class="fa fa-user"></span>
                            <label for="student_id" style="font-family:cursive;"> الطالب</label>
                            <select name="student_id" id="student_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($users ?? [] as $user)
                                @if($user->hasRole('student'))
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                                @endforeach
                            </select>
                    </div>
                        
                </div>
            <div class="row">
                <span class="fa fa-comments" style="color:yellow;"></span>
                <label for="notes" style="font-family:cursive;" id="notes">Notes</label>
                <textarea name="notes" id="notes" class="form-control" rows="3" required></textarea>
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
