@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>Create New Event</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('events.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label>Title</label>
      <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
      <label>Club</label>
      <select name="club_id" class="form-control" required>
        <option value="">Select a club</option>
        @foreach($clubs as $club)
          <option value="{{ $club->id }}" {{ old('club_id') == $club->id ? 'selected' : '' }}>
            {{ $club->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Date</label>
      <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
    </div>

    <div class="mb-3">
      <label>Venue</label>
      <input type="text" name="venue" class="form-control" value="{{ old('venue') }}" required>
    </div>

    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Create Event</button>
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Back</a>
  </form>
</div>
@endsection
