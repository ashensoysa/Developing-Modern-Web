@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>Clubs</h2>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <a href="{{ route('clubs.create') }}" class="btn btn-primary mb-3">Create New Club</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Created By</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @if($clubs->count())
        @foreach($clubs as $club)
          <tr>
            <td>{{ $club->name }}</td>
            <td>{{ $club->creator->name ?? '—' }}</td>
            <td>
              <span class="badge bg-{{ $club->status === 'active' ? 'success' : 'secondary' }}">
                {{ ucfirst($club->status) }}
              </span>
            </td>
            <td>
              <a href="{{ route('clubs.show', $club->id) }}" class="btn btn-sm btn-info">View</a>
              <a href="{{ route('clubs.edit', $club->id) }}" class="btn btn-sm btn-warning">Edit</a>
              <form action="{{ route('clubs.destroy', $club->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this club?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      @else
        <tr>
          <td colspan="4" class="text-center">No clubs found.</td>
        </tr>
      @endif
    </tbody>
  </table>
</div>
@endsection
