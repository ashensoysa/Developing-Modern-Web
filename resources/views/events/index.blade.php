@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>Upcoming Events</h2>
  <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create Event</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Club</th>
        <th>Date</th>
        <th>Venue</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($events as $event)
        <tr>
          <td>{{ $event->title }}</td>
          <td>{{ $event->club->name ?? '—' }}</td>
          <td>{{ $event->date }}</td>
          <td>{{ $event->venue }}</td>
          <td>
            <a href="{{ route('events.show', $event->id) }}" class="btn btn-sm btn-info">View</a>
            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
