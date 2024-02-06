<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    public function organization()
    {
        return view('/org/organization');
    }

    public function showEvent(Events $events)
    {
        $userEmail = Auth::user()->email;
        //dd($userEmail);
        $events = Events::where('email', $userEmail)->get();
        //dd($events);
        return view('org.manageEvent', compact('events'));
    }

    public function createEventForm()
    {
        $userEmail = Auth::user()->email;
        return view('/org/createEvent',  compact('userEmail'));
    }

    public function createEvent(Request $request){
        //dd($request->all());
        Events::create($request->all());
        return redirect()->route('organization.showEvent')->with('success', 'The event has been successfully created');;
    }
    
    public function deleteEvent($id){
        $data = Events::find($id);
        $data->delete();

        return redirect()->route('organization.showEvent')->with('success', 'The event has been successfully deleted');

    }

    public function getEvent($id){
        $data = Events::find($id);
        //dd($data);
        return view('/org/editEvent',  compact('data'));
    }

    public function updateEvent(Request $request, $id){
        $data = Events::find($id);
        $data->update($request->all());
        //dd($data);
        return redirect()->route('organization.showEvent')->with('success', 'The event has been successfully updated');
    }
}
