<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Amranidev\Ajaxis\Ajaxis;
use URL;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('event.index',compact('events'));
    }

    public function create()
    {
        
        return view('event.create');
    }

    public function store(Request $request)
    {
        $event = new Event();

        
        $event->event_title = $request->event_title;

        
        $event->event_type = $request->event_type;

        
        $event->event_date = $request->event_date;

        
        $event->event_desc = $request->event_desc;

        
        
        $event->save();

        return redirect('event');
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

    public function edit($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('event/'. $id . '/edit');
        }

        
        $event = Event::findOrfail($id);
        return view('event.edit',compact('event'  ));
    }

    public function update($id,Request $request)
    {
        $event = Event::findOrfail($id);
    	
        $event->event_title = $request->event_title;
        
        $event->event_type = $request->event_type;
        
        $event->event_date = $request->event_date;
        
        $event->event_desc = $request->event_desc;
        
        
        $event->save();

        return redirect('event');
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
        return URL::to('event');
    }
}
