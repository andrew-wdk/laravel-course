@extends('adminlte::page')
@section('title', 'Events')


@section('content')

<form>
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-12 col-md-6">
                <span class="fa fa-calendar-week"></span>
                    <label for="start-date " style="font-family:cursive;"> start-date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>

                <div class="form-group col-6">
                <span class="fa fa-calendar-week"></span>
                    <label for="end-date" style="font-family:cursive;"> end-date</label>
                    <input name="end_date" id="end_date" type="date" class="form-control"  required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                <span class="fa fa-clock"></span>
                    <label for="departure-time" style="font-family:cursive;"> departure-time</label>
                    <input class="form-control" type="time" name="departure_time" id="departure_time" >
                    </div>
                    <div class="form-group col-12 col-md-6">
                    <span class="fa fa-clock"></span>
                    <label for="return-time" style="font-family:cursive;"> return-time</label>
                    <input  class="form-control" type="time" name="return_time" id="return_time" >
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
                    <span class="fa fa-wallet"></span>
                    <label for="fee" style="font-family:cursive;"> Event Fees </label>
                    <input class="form-control mb-2" type="text" name="event_fees" id="event_fees" >
                </div>
                </div>


                <div class="row">
                <div class="col-12">
                    <span class="fa fa-map-pin"></span>
                    <label for="location" style="font-family:cursive;">Location</label>
                    <input class="form-control mb-3" type="text" name="location" id="location" placeholder="Enter the Event Location">
                </div>
                </div>
                <div>
                <span class="fa fa-comments" style="color:yellow;"></span>
                    <label for="notes" style="font-family:cursive;" id="notes">Notes</label>
                    <textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
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

