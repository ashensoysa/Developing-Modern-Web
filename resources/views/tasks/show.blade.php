@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>{{ $task->title }}</h2>

  <div class="card mb-3">
    <div class="card-body">
      <p><strong>Description:</strong> {{ $task->description ?? 'No description' }}</p>
      <p><strong>Club:</strong> {{ $task->club->name ?? '—' }}</p>
      <p><strong>Assigned To:</strong> {{ $task->assignee->name ?? 'Unassigned' }}</p>
      <p><strong>Deadline:</strong> {{ $task->deadline }}</p>
      <p><strong>Status:</strong>
        <span class="badge bg-{{ $task->status == 'completed' ? 'success' : 'warning' }}">{{ ucfirst($task->status) }}</span>
      </p>

      <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
      <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
    </div>
  </div>
</div>
@endsection
