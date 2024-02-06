<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Events::all();
        return view('home', compact('data'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Perform the search using your model
        $results = Events::where('eventName', 'LIKE', '%' . $keyword . '%')->get();

        return view('searchResult', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $events)
    {
        $eventDetails = Events::where('id', $events->id)->first();
        $userDetails = User::where('email', $eventDetails->email)->first();
        //dd($eventDetails);
        return view('show', ['events' => $eventDetails], ['organizer' => $userDetails]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventsRequest $request, Events $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $events)
    {
        //
    }

    /*
    public function likeEvent(Request $request, $eventId)
    {
        $user = auth()->user();
        $event = Events::findOrFail($eventId);

        // Check if the user already liked the event
        if ($user->hasLikedEvent($event)) {
            // Unlike the event
            $user->eventLikes()->detach($event);
            return response()->json(['liked' => false]);
        } else {
            // Like the event
            $user->eventLikes()->attach($event);
            return response()->json(['liked' => true]);
        }
    }
    */
}
