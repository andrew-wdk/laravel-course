@extends('adminlte::page')
@section('title', 'Events')


@section('content')
<form>
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-6">
                <span class="fa fa-calendar-week"></span>
                    <label for="start-date " style="font-family:cursive;"> start-date</label>
                    <input type="date" name="st-date" id="sd" class="form-control" required>
                </div>

                <div class="form-group col-6">
                <span class="fa fa-calendar-week"></span>
                    <label for="end-date" style="font-family:cursive;"> end-date</label>
                    <input name="end_date" id="ed" type="date" class="form-control"  required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                <span class="fa fa-clock"></span>
                    <label for="departure-time" style="font-family:cursive;"> departure-time</label>
                    <input class="form-control" type="time" name="dt" id="dep-time" >
                    </div>
                    <div class="form-group col-6">
                    <span class="fa fa-clock"></span>
                    <label for="return-time" style="font-family:cursive;"> return-time</label>
                    <input  class="form-control" type="time" name="rt" id="ret-time" >
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-12">
                <span class="fa fa-user"></span>
                    <label for="leader_id" style="font-family:cursive;">Leader-ID</label>
                    <select name="leader_id" id="leader_id" class="form-control">
                        <option value="">Select</option>
                        @foreach($users ?? [] as $id => $name)
                            <option value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="row">
                <div class="col-12">
                    <span class="fa fa-map-pin"></span>
                    <label for="location" style="font-family:cursive;">Location</label>
                    <input class="form-control" type="text" name="location" id="loc" placeholder="Enter the Event Location"
                      style="border-radius:7px; border: 2px solid;"  >
                    </select>
                </div>
                </div>
                <div>
                <span class="fa fa-comments" style="color:yellow;"></span>
                    <label for="notes" style="font-family:cursive;">Notes</label>
                    <textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" style="background-color:black; border:none;
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

