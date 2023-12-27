<!--Extending template layout-->
@extends('layouts.orgmain')

@section('container')

    @foreach ($events as $event)
        {{ $event->eventName }}
    @endforeach

    <table class="table">
    <thead class="table-dark">
        ...
    </thead>
    <tbody>
        ...
    </tbody>
    </table>
@endsection  