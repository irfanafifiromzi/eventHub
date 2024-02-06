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
                        <h4>Add Event
                            <a href="{{ url('events') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
    
                        <form action="/storeevent" method="POST">
                            @csrf
    
                            <div class="form-group mb-3">
                                <label for="">Event Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <input type="text" name="description"  class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Location</label>
                                <input type="text" name="location" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Event Category</label>
                                <input type="text" name="category" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Start Date</label>
                                <input type="date" name="startdate" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">End Date</label>
                                <input type="date" name="enddate" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Start Time</label>
                                <input type="time" name="starttime" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">End Time</label>
                                <input type="time" name="endtime" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Price (RM)</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Event Capacity</label>
                                <input type="number" name="capacity" min="1" class="form-control" required>
                            </div>
                        
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Add Event</button>
                            </div>
    
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection