@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>Create Task</h2>
  <form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label>Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label>Club</label>
        <select name="club_id" class="form-control" required>
        <option value="">Select a club</option>
        @foreach($clubs as $club)
        <option value="{{ $club->id }}">{{ $club->name }}</option>
        @endforeach
        </select>
    </div>


    <div class="mb-3">
      <label>Assign To</label>
      <select name="assigned_to" class="form-control">
        <option value="">— Select Member —</option>
        @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Deadline</label>
      <input type="date" name="deadline" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Create</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
