@extends('layouts.adminmain')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
    
                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Event
                            <a href="{{ url('events') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
    
                        <form action="{{ url('updateevent/'.$event->id) }}" method="POST">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group mb-3">
                                <label for="">Event Name</label>
                                <input type="text" name="name" value="{{ $event->eventName }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <input type="text" name="description" value="{{ $event->eventDescription }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Location</label>
                                <input type="text" name="location" value="{{ $event->eventLocation }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Event Category</label>
                                <input type="text" name="category" value="{{ $event->eventCategory }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Start Date</label>
                                <input type="text" name="startdate" value="{{ $event->eventStartDate }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">End Date</label>
                                <input type="text" name="enddate" value="{{ $event->eventEndDate }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Start Time</label>
                                <input type="text" name="starttime" value="{{ $event->eventStartTime }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">End Time</label>
                                <input type="text" name="endtime" value="{{ $event->eventEndTime }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Price</label>
                                <input type="text" name="price" value="{{ $event->eventPrice }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Event Capacity</label>
                                <input type="text" name="capacity" value="{{ $event->eventCapacity }}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option value="Pending" {{ $event->eventStatus === 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Confirmed" {{ $event->eventStatus === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="Rejected" {{ $event->eventStatus === 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </div>
                        
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update Event</button>
                            </div>
    
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection