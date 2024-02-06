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
    
}
