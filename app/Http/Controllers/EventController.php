<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Event::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        
        $event = Event::create($request->all());
        return response()->json($event, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        
        $event = Event::findOrFail($event->id);

        return response()->json($event);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        
        $event = Event::findOrFail($event->id);
        $event->update($request->all());

        return response()->json($event, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
            
        $event = Event::findOrFail($event->id);
        $event->delete();

        return response()->json(null, 204);
    
    }

    /**
     * Get active events
     *
     * @return \Illuminate\Http\Response
     */
    public function getActiveEvents()
    {
        // Get active events where startAt is less than now and endAt is greater than now
        $events = Event::where('startAt', '<', now())->where('endAt', '>', now())->get();

        return response()->json($events);
    }
}
