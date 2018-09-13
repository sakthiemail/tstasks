<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="#">
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
      @if( Auth::user()->hasRole('administrator'))
      <li class="nav-item">
        <a class="nav-link" href="{{url('users')}}">
          Users
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{url('posts')}}">
          Posts
        </a>
      </li>
    </ul>
  </div>
</nav>
