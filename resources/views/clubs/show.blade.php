@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>{{ $club->name }}</h2>

  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">Club Description</h5>
      <p class="card-text">{{ $club->description ?? 'No description provided.' }}</p>

      <h6 class="card-subtitle mt-3 text-muted">Created by:</h6>
      <p>{{ $club->creator->name ?? 'Unknown' }}</p>

      <h6 class="card-subtitle text-muted">Status:</h6>
      <span class="badge bg-{{ $club->status == 'approved' ? 'success' : 'warning' }}">
        {{ ucfirst($club->status) }}
      </span>

      <div class="mt-4">
        <a href="{{ route('clubs.edit', $club->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Back to List</a>
      </div>
    </div>
  </div>

  {{-- Optional Section: Expand later to show members, events, or tasks --}}
  {{-- Example: --}}
  {{-- <h4>Upcoming Events</h4>
       <ul>
          @foreach($club->events as $event)
            <li>{{ $event->title }} – {{ $event->date->format('M d, Y') }}</li>
          @endforeach
       </ul> --}}

</div>
@endsection
