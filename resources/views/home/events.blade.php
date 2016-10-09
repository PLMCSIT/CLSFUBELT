@extends('layouts.basic')
@section('title')
Events
@endsection
@section('active')
Events
@endsection
@section('content')
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <!-- Events Listing -->
                    <div class="listing events-listing">
                        <header class="listing-header">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h3>All events</h3>
                                </div>
                            </div>
                        </header>
                        <section class="listing-cont">
                            <ul>
                                @foreach($events as $Event)    
                                    <li class="item event-item">
                                        <div class="event-date"> <span class="date">{{$Event->event_day}}</span> <span class="month">{{$Event->event_month}}</span> </div>
                                        <div class="event-detail">
                                            <h4><a href="{{url('view_event')}}/{{$Event->id}}">{{$Event->event_title}}</a></h4>
                                            <span class="event-dayntime meta-data">{{$Event->event_time}}</span> </div>
                                        <div class="to-event-url">
                                            <div><a href="{{url('view_event')}}/{{$Event->id}}" class="btn btn-default btn-sm">Details</a></div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    </div>
                </div>

                <?php
                        $getLatestEvent = DB::table('events')->orderBy('event_date')->take(1)->get();
                        $getEvent = $getLatestEvent[0];
                        switch($getEvent->event_month)
                        {
                            case 'JAN':
                            $month = "January";
                            break;
                            case 'FEB':
                            $month = "February";
                            break;
                            case 'MAR':
                            $month = "March";
                            break;
                            case 'APR':
                            $month = "April";
                            break;
                            case 'MAY':
                            $month = "May";
                            break;
                            case 'JUN':
                            $month = "June";
                            break;
                            case 'JUL':
                            $month = "July";
                            break;
                            case 'AUG':
                            $month = "August";
                            break;
                            case 'SEP':
                            $month = "September";
                            break;
                            case 'OCT':
                            $month = "October";
                            break;
                            case 'NOV':
                            $month = "November";
                            break;
                            case 'DEC':
                            $month = "December";
                            break;
                        }
                        $event = $getEvent->event_title;
                        $day = $getEvent->event_day;
                        $year = $getEvent->event_year;
                        $date = $month." ".$day.", ".$year;
                        $event_id = $getEvent->id;
                    ?>


                <!-- Start Sidebar -->
                <div class="col-md-3 sidebar">
                    <div class="widget-upcoming-events widget">
                        <!-- Featured Event Widget -->
                        <div class="widget featured_event_widget">
                            <div class="sidebar-widget-title">
                                <h3>Featured Event</h3>
                            </div>
                            <img src="images/gallery-img6.jpg" alt="" class="featured-event-image">
                            <div class="featured-event-container">
                                <label class="label label-danger">Upcoming</label> <!-- Replace class label-danger to label-default for passed events -->
                                <div class="featured-event-time">
                                    <span class="date">{{$day}}</span>
                                    <span class="month">{{$getEvent->event_month.", ".$year}}</span>
                                </div>
                                <h4 class="featured-event-title"><a href="{{ url('view_event')}}/{{$event_id}}">{{$event}}</a></h4>
                                <p>{{$getEvent->event_desc}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop