<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Event_users;
use Amranidev\Ajaxis\Ajaxis;
use URL;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('home.events',compact('events'));
    }

    public function index2()
    {
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('scaffold-interface.events.index', compact('events'));
    }

    public function view_event($id){
        $event = Event::findOrFail($id);
        return view('home.view_event', compact('event'));
    }

    public function join($user_id, $event_id)
    {
        $uid = \Auth::user()->id;
        if($uid == $user_id)
        {
            $join = new Event_users;
            $join->user_id = $user_id;
            $join->event_id = $event_id;
            $join->save();
        }
        return redirect('view_event/'.$event_id);
    }

    public function leave($user_id, $event_id)
    {
        $uid = \Auth::user()->id;
        if($uid == $user_id)
        {
            $deleted = \DB::table('event_users')->where('user_id','=',$user_id)->where('event_id','=',$event_id)->delete();
        }
        return redirect('view_event/'.$event_id);
    }

    public function create()
    {
        
        return view('scaffold-interface.events.create');
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->event_title = $request->event_title;
        $event->event_type = $request->event_type;
        $event->event_desc = $request->event_desc;
        $event->event_month = $request->event_month;
        $event->event_day = $request->event_day;
        $event->event_year = $request->event_year;
        $event->event_time = $request->event_time;
        $month = "";
        switch ($request->event_month) {
            case 'JAN':
            $month = "1";
            break;
            case 'FEB':
            $month = "2";
            break;
            case 'MAR':
            $month = "3";
            break;
            case 'APR':
            $month = "4";
            break;
            case 'MAY':
            $month = "5";
            break;
            case 'JUN':
            $month = "6";
            break;
            case 'JUL':
            $month = "7";
            break;
            case 'AUG':
            $month = "8";
            break;
            case 'SEP':
            $month = "9";
            break;
            case 'OCT':
            $month = "10";
            break;
            case 'NOV':
            $month = "11";
            break;
            case 'DEC':
            $month = "12";
            break;
        }
        $date = $request->event_year."-".$month."-".$request->event_day;
        $event->event_date = $date;
        
        $event->save();

        return redirect('events');
    }

    public function show($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('event/'.$id);
        }

        $event = Event::findOrfail($id);
        return view('event.show',compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('scaffold-interface.events.edit', compact('event'));
    }

    public function update(Request $request)
    {
        $event = Event::findOrfail($request->id);
    	
        $event->event_title = $request->event_title;
        $event->event_type = $request->event_type;
        $event->event_desc = $request->event_desc;
        $event->event_month = $request->event_month;
        $event->event_day = $request->event_day;
        $event->event_year = $request->event_year;
        $event->event_time = $request->event_time;
        $month = "";
        switch ($request->event_month) {
            case 'JAN':
            $month = "1";
            break;
            case 'FEB':
            $month = "2";
            break;
            case 'MAR':
            $month = "3";
            break;
            case 'APR':
            $month = "4";
            break;
            case 'MAY':
            $month = "5";
            break;
            case 'JUN':
            $month = "6";
            break;
            case 'JUL':
            $month = "7";
            break;
            case 'AUG':
            $month = "8";
            break;
            case 'SEP':
            $month = "9";
            break;
            case 'OCT':
            $month = "10";
            break;
            case 'NOV':
            $month = "11";
            break;
            case 'DEC':
            $month = "12";
            break;
        }
        $date = $request->event_year."-".$month."-".$request->event_day;
        $event->event_date = $date;
        
        $event->save();

        return redirect('events');
    }

    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/event/'. $id . '/delete/');

        if($request->ajax())
        {
            return $msg;
        }
    }

    public function destroy($id)
    {
     	$event = Event::findOrfail($id);
     	$event->delete();
        return redirect('events');
    }
}
