<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ClubPortal</a>
    <span class="navbar-text ms-auto text-white">
      Welcome, {{ auth()->user()->name ?? 'Guest' }}
      <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
    </form>
    </span>
  </div>
</nav>
