<!--Extending template layout-->
@extends('layouts.main')

@section('container')

    <h3>Find your next event</h3>

    <div class="allEvent">
        <div class="eventButton">
            <a class="eventCategory" href="/musicEvent">
                <img class="eventImage" src="{{ asset('img/music.png') }}" alt="music">
            </a>
            <h6 class="eventTitle">Music</h6>
        </div>
        <div class="eventButton">
            <a class="eventCategory" href="/artsEvent">
                <img class="eventImage" src="{{ asset('img/art.png') }}" alt="art">
            </a>
            <h6 class="eventTitle">Perform & Visual Arts</h6>
            <br>
        </div>
    </div>

    <h3>Upcoming Events</h3> <br>
    
        @foreach ($data as $event)
        <div class="upcomingEvent">
            <img class="upcomingImage" src="img/event.png" alt="event">
            <h5>{{ $event->eventName }}</h5>
            <h6>{{ $event->eventStartDate->format('F j, Y') }}</h6><br>
            <h6>Rm {{ $event->eventPrice }}</h6>
            <a href="{{ route('events.show', ['events' => $event->id]) }}">More</a>
        </div>
        @endforeach

@endsection        