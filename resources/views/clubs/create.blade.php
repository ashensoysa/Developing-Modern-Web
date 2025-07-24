@extends('layouts.app')

@section('content')
<div class="mt-4">
  <h2>Create New Club</h2>
  <form action="{{ route('clubs.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Club Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
    </div>

    

    <button type="submit" class="btn btn-success">Create</button>
    <a href="{{ route('clubs.index') }}" class="btn btn-secondary">Back</a>
  </form>
</div>
@endsection
