@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>Dashboard</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="card bg-primary text-white mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Clubs</h5>
          <p class="card-text">{{ $clubCount }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-success text-white mb-3">
        <div class="card-body">
          <h5 class="card-title">Upcoming Events</h5>
          <p class="card-text">{{ $eventCount }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-warning text-white mb-3">
        <div class="card-body">
          <h5 class="card-title">Pending Tasks</h5>
          <p class="card-text">{{ $taskCount }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
