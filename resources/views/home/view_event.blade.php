@extends('layouts.basic')
@section('event_title')
{{$event->event_title}}
@endsection
@section('active')
{{$event->event_title}}
@endsection
@section('content')
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
          <h4>&nbsp;&nbsp;&nbsp;{{$event->event_desc}}</h4>

          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Event details</h3>
              </div>
              <div class="panel-body">
                <ul class="info-table">
                  <li><i class="fa fa-calendar"></i> <?php echo $event->event_month." ".$event->event_day.", ".$event->event_year; ?></li>
                  <li><i class="fa fa-clock-o"></i> {{$event->event_time}} </li>
                  <li><i class="fa fa-users"> {{$event->event_type}} </i> </li>
                </ul>
              </div>
            </div>
          </div>
            
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Event Status</h3>
              </div>
                <ul class="list-group">
                    <?php
                        $attendees = DB::table('event_users')->where('event_id','=',$event->id)->get()->count();
                    ?>
                  <li class="list-group-item"> <span class="badge"> {{$attendees}} </span> Attendees </li>
                  @if(Auth::guest())
                  @else
                    <?php
                        $id = Auth::user()->id;
                        $joined = false;
                        $event_user_tbl = DB::table('event_users')->where('user_id','=',$id)->where('event_id','=',$event->id)->get();
                    ?>
                    @if(empty($event_user_tbl[0]))
                    <a href="{{url('event/join')}}/{{$id}}/{{$event->id}}" class="btn btn-primary btn-lg btn-block">Join Event</a>
                    @else
                    <a href="{{url('event/leave')}}/{{$id}}/{{$event->id}}" class="btn btn-primary btn-lg btn-block">Leave Event</a>
                    @endif
                  @endif
                </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@stop