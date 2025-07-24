@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>{{ $event->title }}</h2>

  <div class="card">
    <div class="card-body">
      <p><strong>Club:</strong> {{ $event->club->name ?? '—' }}</p>
      <p><strong>Date:</strong> {{ $event->date }}</p>
      <p><strong>Venue:</strong> {{ $event->venue }}</p>
      <p><strong>Description:</strong> {{ $event->description ?? 'No description provided.' }}</p>

      <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
      <a href="{{ route('events.index') }}" class="btn btn-secondary">Back</a>
    </div>
  </div>
</div>
@endsection
