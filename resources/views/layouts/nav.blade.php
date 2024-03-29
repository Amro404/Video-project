 <nav class="navbar navbar-expand-lg fixed-top bg-danger">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom">
          Video Project
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" rel="tooltip" title="Star on GitHub" data-placement="bottom" href="https://github.com/Amro404" target="_blank">
                  <i class="fa fa-github"></i>
                  <p class="d-lg-none">GitHub</p>
                </a>
            </li>
          <li class="nav-item">
            <!-- Example single danger button -->
            <div class="btn-group">
              <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
              </a>
              <div class="dropdown-menu">

                @foreach($categories as $category)
                  <a class="dropdown-item" href="/category/{{ $category->id }}">{{ $category->name }}</a>
                
                @endforeach
              </div>
            </div>
          </li>
        <li class="nav-item">
            <!-- Example single danger button -->
            <div class="btn-group">
              <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Skills
              </a>
              <div class="dropdown-menu">
                @foreach($skills as $skill)

                  <a class="dropdown-item" href="/skill/{{ $skill->id }}">{{ $skill->name }}</a>
                
                @endforeach
              </div>
            </div>
          </li>

          @if(Auth::user())
          <li class="nav-item">
            <div class="btn-group">
              <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->name }}
              </a>
              <div class="dropdown-menu">
                
                <a class="dropdown-item" href="/profile/{{ auth()->user()->id }}">Profile</a>

                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
               
                </form>
                
              </div>

            </div>
          </li>
          @else
          <li class="nav-item">
              <a href="/login" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
              <a href="/register" class="nav-link">Register</a>
          </li>
          @endif

          <li class="nav-item" style="margin-top: 15px;">

            <form class="form-inline ml-auto" action="/home" method="GET">
              <div class="form-group has-white">
                <input type="text" name="search" class="form-control" placeholder="Search">
              </div>
            </form>

          </li>

        </ul>

      </div>

    </div>
  </nav>