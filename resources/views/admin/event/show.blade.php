@extends('adminlte::page')
@section('title', 'Events')


@section('content')

    <div class="card card-primary">
        <div class="card-body">

            <div class="col-lg-4 my-1 form-Roles">
                <label class="form-label">Title</label>
                <p type="text" class="form-control " name="title" >{{old('title', $event->title)}}</p>
                @error('title')
                    <div class="text-danger"> {{$errors->first('title')}} </div>
                @enderror
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                <span class="fa fa-calendar-week"></span>
                    <label for="start-date " style="font-family:cursive;"> start-date</label>
                    <p  name="start_date" id="sd" class="form-control">{{old('title', $event->start_date)}}</p>
                </div>

                <div class="form-group col-6">
                <span class="fa fa-calendar-week"></span>
                    <label for="end-date" style="font-family:cursive;"> end-date</label>
                    <p name="end_date" id="end_date" type="date" class="form-control">{{old('title', $event->end_date)}}</p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                <span class="fa fa-clock"></span>
                    <label for="departure-time" style="font-family:cursive;"> departure-time</label>
                    <p class="form-control"  name="departure_time" id="departure_time"> {{old('title', $event->departure_time)}}</p>
                    </div>
                    <div class="form-group col-12 col-md-6">
                    <span class="fa fa-clock"></span>
                    <label for="return-time" style="font-family:cursive;"> return-time</label>
                    <p  class="form-control"  name="return_time" id="return_time"> {{old('title', $event->return_time)}}</p>
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-12">
                <span class="fa fa-user"></span>
                    <label for="leader_id" style="font-family:cursive;">Leader</label>
                    <p  class="form-control " name="title"> {{old('title', $event->leader->name)}}</p>
                </div>
                </div>

                <div class="row">
                <div class="col-12">
                    <span class="fa fa-wallet"></span>
                    <label for="fee" style="font-family:cursive;"> Event Fees </label>
                    <p class="form-control mb-2"  name="event_fees" id="event_fees"> {{old('title', $event->event_fees)}}</p>
                </div>
                </div>


                <div class="row">
                <div class="col-12">
                    <span class="fa fa-map-pin"></span>
                    <label for="location" style="font-family:cursive;">Location</label>
                    <p class="form-control mb-3"  name="location" id="location" placeholder="Enter the Event Location"> {{old('title', $event->location)}}</p>
                </div>
                </div>
                <div>
                <span class="fa fa-comments" style="color:yellow;"></span>
                    <label for="notes" style="font-family:cursive;" id="notes">Notes</label>
                    <p name="notes" id="notes" class="form-control" rows="3">{{ old('body', $event->notes) }}</p>
                </div></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">

            <form action="{{ route('admin.event.index') }}" method="get">
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