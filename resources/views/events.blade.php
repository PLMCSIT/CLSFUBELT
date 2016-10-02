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
                                <div class="listing-header-sub col-md-6 col-sm-6">
                                    <h5>February</h5>
                                    <nav class="next-prev-nav"> <a href="#"><i class="fa fa-angle-left"></i></a> <a href="#"><i class="fa fa-angle-right"></i></a> </nav>
                                </div>
                            </div>
                        </header>
                        <section class="listing-cont">
                            <ul>
                                <li class="item event-item">
                                    <div class="event-date"> <span class="date">06</span> <span class="month">Feb</span> </div>
                                    <div class="event-detail">
                                        <h4><a href="single-event.html">Monday Prayer</a></h4>
                                        <span class="event-dayntime meta-data">Monday | 07:00 AM</span> </div>
                                    <div class="to-event-url">
                                        <div><a href="single-event.html" class="btn btn-default btn-sm">Details</a></div>
                                    </div>
                                </li>
                                <li class="item event-item">
                                    <div class="event-date"> <span class="date">25</span> <span class="month">Feb</span> </div>
                                    <div class="event-detail">
                                        <h4><a href="single-event.html">Staff members meet</a></h4>
                                        <span class="event-dayntime meta-data">Monday | 01:00 PM</span> </div>
                                    <div class="to-event-url">
                                        <div><a href="single-event.html" class="btn btn-default btn-sm">Details</a></div>
                                    </div>
                                </li>
                                <li class="item event-item">
                                    <div class="event-date"> <span class="date">28</span> <span class="month">Feb</span> </div>
                                    <div class="event-detail">
                                        <h4><a href="single-event.html">Evening Prayer</a></h4>
                                        <span class="event-dayntime meta-data">Friday | 06:00 PM</span> </div>
                                    <div class="to-event-url">
                                        <div><a href="single-event.html" class="btn btn-default btn-sm">Details</a></div>
                                    </div>
                                </li>
                                <li class="item event-item">
                                    <div class="event-date"> <span class="date">06</span> <span class="month">Feb</span> </div>
                                    <div class="event-detail">
                                        <h4><a href="single-event.html">Monday Prayer</a></h4>
                                        <span class="event-dayntime meta-data">Monday | 07:00 AM</span> </div>
                                    <div class="to-event-url">
                                        <div><a href="single-event.html" class="btn btn-default btn-sm">Details</a></div>
                                    </div>
                                </li>
                                <li class="item event-item">
                                    <div class="event-date"> <span class="date">25</span> <span class="month">Feb</span> </div>
                                    <div class="event-detail">
                                        <h4><a href="single-event.html">Staff members meet</a></h4>
                                        <span class="event-dayntime meta-data">Monday | 01:00 PM</span> </div>
                                    <div class="to-event-url">
                                        <div><a href="single-event.html" class="btn btn-default btn-sm">Details</a></div>
                                    </div>
                                </li>
                                <li class="item event-item">
                                    <div class="event-date"> <span class="date">28</span> <span class="month">Feb</span> </div>
                                    <div class="event-detail">
                                        <h4><a href="single-event.html">Evening Prayer</a></h4>
                                        <span class="event-dayntime meta-data">Friday | 06:00 PM</span> </div>
                                    <div class="to-event-url">
                                        <div><a href="single-event.html" class="btn btn-default btn-sm">Details</a></div>
                                    </div>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
                <!-- Start Sidebar -->
                <div class="col-md-3 sidebar">
                    <div class="widget-upcoming-events widget">
                        <!-- Featured Event Widget -->
                        <div class="widget featured_event_widget">
                            <div class="sidebar-widget-title">
                                <h3>Featured Event</h3>
                            </div>
                            <img src="images/event-img2.jpg" alt="" class="featured-event-image">
                            <div class="featured-event-container">
                                <label class="label label-danger">Upcoming</label> <!-- Replace class label-danger to label-default for passed events -->
                                <div class="featured-event-time">
                                    <span class="date">21</span>
                                    <span class="month">Aug, 14</span>
                                </div>
                                <h4 class="featured-event-title"><a href="#">A nice event title</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis consectetur adipiscing elit. Nulla convallis egestas rhoncus</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop