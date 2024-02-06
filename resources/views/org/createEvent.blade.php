<!--Extending template layout-->
@extends('layouts.createmain')

@section('container')


<a href="{{ route('organization.showEvent')}}">
    <button type="button" class="btn btn-info mb-3">Back</button>
</a>
<h3>Create Event</h3>

<form action="/createEvent" method="post" enctype="multipart/form-data">
    @csrf

  <div class="mb-3">
    <label for="eventName" class="form-label">Event name</label>
    <input type="text" class="form-control" id="eventName" name="eventName" required>
  </div>
  
  <div class="mb-3">
    <label for="eventDescription" class="form-label">Event description</label>
    <textarea  class="form-control" id="eventDescription" name="eventDescription" required></textarea>
  </div>

  <div class="mb-3">
    <label for="eventLocation" class="form-label">Location</label>
    <input type="text" class="form-control" id="eventLocation" name="eventLocation" required>
  </div>

  <div class="mb-3">
    <label for="eventCategory" class="form-label">Category</label>
    <input type="text" class="form-control" id="eventCategory" name="eventCategory" required>
  </div>

  <div class="mb-3">
    <label for="eventStartDate" class="form-label">Start date</label>
    <input type="date" class="form-control" id="eventStartDate"name="eventStartDate" required>
  </div>

  <div class="mb-3">
    <label for="eventStartTime" class="form-label">Start time</label>
    <input type="time" class="form-control" id="eventStartTime" name="eventStartTime" required>
  </div>

  <div class="mb-3">
    <label for="eventEndDate" class="form-label">End date</label>
    <input type="date" class="form-control" id="eventEndDate" name="eventEndDate" required>
  </div>

  <div class="mb-3">
    <label for="eventEndTime" class="form-label">End time</label>
    <input type="time" class="form-control" id="eventEndTime"  name="eventEndTime" required>
  </div>

  <div class="mb-3">
    <label for="eventPrice" class="form-label">Price</label>
    <input type="number" class="form-control" id="eventPrice" min="0" name="eventPrice" required>
  </div>

  <div class="mb-3">
    <label for="eventCapacity" class="form-label">Capacity</label>
    <input type="number" class="form-control" id="eventCapacity" min="1" name="eventCapacity" required>
  </div>

  <!-- Hidden Input Example -->
  <input type="hidden" name="eventStatus" value="Pending">
  <input type="hidden" name="email" value="{{ $userEmail }}">

  <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection  