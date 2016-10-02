{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Index Event</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Event Index</h1>
            <form class = 'col s3' method = 'get' action = '{{url("event")}}/create'>
                <button class = 'btn btn-primary' type = 'submit'>Create New Event</button>
            </form>
            <br>
            
            <br>
            <table class = "table table-striped table-bordered">
                <thead>
                    
                    <th>event_title</th>
                    
                    <th>event_type</th>
                    
                    <th>event_date</th>
                    
                    <th>event_desc</th>
                    
                    
                    <th>actions</th>
                </thead>
                <tbody>
                    @foreach($events as $Event)
                    <tr>
                        
                        <td>{{$Event->event_title}}</td>
                        
                        <td>{{$Event->event_type}}</td>
                        
                        <td>{{$Event->event_date}}</td>
                        
                        <td>{{$Event->event_desc}}</td>
                        
                        
                        <td>
                                <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/event/{{$Event->id}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                                <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/event/{{$Event->id}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/event/{{$Event->id}}'><i class = 'material-icons'>info</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class = 'AjaxisModal'>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script> var baseURL = "{{URL::to('/')}}"</script>
<script src = "{{ URL::asset('js/AjaxisBootstrap.js')}}"></script>
<script src = "{{ URL::asset('js/scaffold-interface-js/customA.js')}}"></script>
</html> --}}



@extends('layout')

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
                                            <h4><a href="single-event.html">{{$Event->event_title}}</a></h4>
                                            <span class="event-dayntime meta-data">{{$Event->event_time}}</span> </div>
                                        <div class="to-event-url">
                                            <div><a href="single-event.html" class="btn btn-default btn-sm">Details</a></div>
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
                                <h4 class="featured-event-title"><a href="#">{{$event}}</a></h4>
                                <p>{{$getEvent->event_desc}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop