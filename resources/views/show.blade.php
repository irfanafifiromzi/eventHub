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
        <div class="ticket">
            <h5>Ticket Price</h5>
            <p>RM {{ $events->eventPrice }}</p>
            <a href="#">Get tickets</a>
        </div>

    </div>
@endsection  