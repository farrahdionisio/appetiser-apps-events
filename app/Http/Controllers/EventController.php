<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventDay;
use App\Http\Requests\StoreEvent;
class EventController extends Controller
{

    public function index()
    {
        $events = Event::with('event_days.days')->get();

        $eventList = array();
        for($i = 0; $i < count($events); $i++){
            $eventList[$i]['title'] = $events[$i]['name'];
            $eventList[$i]['start'] = $events[$i]['start_date'];
            $eventList[$i]['end'] = $events[$i]['end_date'];

            $weekday = array();
            for($j = 0; $j < count($events[$i]['event_days']); $j++){
                $weekday[$j] = $events[$i]['event_days'][$j]['day_id'];
            } 

            $eventList[$i]['repeat'] = [
                'weekdays' => $weekday,
            ];        
        }

        return response()->json($eventList);
    }
    
    
    public function store(Request $request, Event $event)
    {
        $events = $event->store($request->all());
        return response()->json($events);
    }
}
