@extends('layouts.adminmain')

@section('container')
    <h1>Home</h1><br><br>

    <div class="Requests">
        <img class="upcomingImage" src="img/event.png" alt="event">
        <br><br>
        <p>There are {{ $count }} pending requests</p>
        <a href="/requests">View</a>
    </div>
@endsection