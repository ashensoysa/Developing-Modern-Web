@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>Edit Club</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('clubs.update', $club->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="{{ $club->name }}" required>
    </div>

    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control" rows="4">{{ $club->description }}</textarea>
    </div>

    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-control">
        <option value="active" {{ $club->status === 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ $club->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Update Club</button>
    <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Back</a>
  </form>
</div>
@endsection
