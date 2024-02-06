@extends('layouts.main')

@section('container')
    <h3>Results</h3>

    <div class="card-deck">
    @foreach ($results as $event)
        <div class="card mb-4" style="width: 18rem;">
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