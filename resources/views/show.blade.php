<!--Extending template layout-->
@extends('layouts.main')

@section('container')
    <img class="themepic" src="{{ asset('img/eventoffuture.jpg') }}" alt="bigpic">
    <div class="eventInfo">
        <div class="eventInfo2">
            <br>
        <h2 style="font-weight: bold">{{ $events->eventName }}</h2>
        <p>{{ $events->eventDescription }}</p>
            <h5>Date and time</h5>
                <h6 style="font-style: italic">Start</h6>
                    <p>{{ $events->eventStartDate->format('F j, Y') }}, {{ $events->eventStartTime->format('g:i A') }}</p>
                <h6 style="font-style: italic">End</h6>
                    <p>{{ $events->eventEndDate->format('F j, Y') }}, {{ $events->eventEndTime->format('g:i A') }}</p>
            <h5>Location</h5>
                <p>{{ $events->eventLocation }}</p>
            <h5>Organizer</h5>
                <p>{{ $organizer->f_name }} {{ $organizer->l_name }}
                <br> Contacts : {{ $organizer->email }}
            </p>
        </div>

        <div class="card" id="ticket" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Single Pax</h5>
                <p class="card-text">RM {{ $events->eventPrice }}</p>
                
                <form action="/session" method="POST">
                    <label for="quantity">Quantity:</label>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="number" id="quantity" name="quantity" min="1" max="{{ $events->eventCapacity }}" value="1">
                    <input type="hidden" name="eventPrice" value="{{ $events->eventPrice }}">
                    <input type="hidden" name="eventName" value="{{ $events->eventName }}">
                    <input type="hidden" name="eventId" value="{{ $events->id }}">
                    <br><br><button type="submit" class="btn btn-primary">Get Tickets</button>
                </form>
            </div>
            
        </div>

    </div>
@endsection  