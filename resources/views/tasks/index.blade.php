@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>All Tasks</h2>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Club</th>
        <th>Assigned To</th>
        <th>Deadline</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tasks as $task)
        <tr>
          <td>{{ $task->title }}</td>
          <td>{{ $task->club->name ?? '—' }}</td>
          <td>{{ $task->assignee->name ?? 'Unassigned' }}</td>
          <td>{{ $task->deadline }}</td>
          <td>
            <span class="badge bg-{{ $task->status == 'completed' ? 'success' : 'warning' }}">
              {{ ucfirst($task->status) }}
            </span>
          </td>
          <td>
            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">View</a>
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this task?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
