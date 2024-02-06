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
    
    <div class="d-flex flex-row">
        @foreach ($data as $event)
            <div class="card" style="width: 18rem; margin-right: 10px;">
                <img src="img/eventoffuture.jpg" class="card-img-top" alt="event">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->eventName }}</h5>
                    <p class="card-text">{{ $event->eventStartDate->format('F j, Y') }}</p>
                    <p>Rm {{ $event->eventPrice }}</p>
                    <a href="{{ route('events.show', ['events' => $event->id]) }}" class="btn btn-primary">More</a>
                </div>
            </div>
        @endforeach
    </div>



@endsection        