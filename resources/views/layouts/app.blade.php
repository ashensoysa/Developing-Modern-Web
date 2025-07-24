<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>School Club Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { padding-top: 56px; }
    .sidebar {
      height: 100vh;
      background-color: #343a40;
      padding-top: 20px;
    }
    .sidebar a {
      color: white;
      display: block;
      padding: 10px 20px;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
  </style>
</head>
<body>
  @include('layouts.nav')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 sidebar">
        <a href="{{ url('/dashboard') }}">Dashboard</a>
        <a href="{{ url('/clubs') }}">Clubs</a>
        <a href="{{ url('/tasks') }}">Tasks</a>
        <a href="{{ url('/events') }}">Events</a>
      </div>
      <div class="col-md-10">
        @yield('content')
      </div>
    </div>
  </div>
</body>
</html>
