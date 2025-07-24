@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>Edit Event</h2>
  <form action="{{ route('events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label>Title</label>
      <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
    </div>

    <div class="mb-3">
      <label>Club</label>
      <select name="club_id" class="form-control">
        @foreach($clubs as $club)
          <option value="{{ $club->id }}" {{ $event->club_id == $club->id ? 'selected' : '' }}>
            {{ $club->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Date</label>
      <input type="date" name="date" class="form-control" value="{{ $event->date }}">
    </div>

    <div class="mb-3">
      <label>Venue</label>
      <input type="text" name="venue" class="form-control" value="{{ $event->location }}">
    </div>

    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control" rows="3">{{ $event->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-warning">Update</button>
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
