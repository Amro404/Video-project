    <div class="sidebar" data-color="purple" data-background-color="black" data-image="{{ asset('assets/img/sidebar-2.jpg') }}">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="/" class="simple-text logo-normal">
           Video Project
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ is_active('home') }}">
            <a class="nav-link" href="/admin/home">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item {{ is_active('users') }}">
            <a class="nav-link" href="/admin/users">
              <i class="material-icons">person</i>
              <p>Users</p>
            </a>
          </li>

          <li class="nav-item {{ is_active('categories') }}">
            <a class="nav-link" href="/admin/categories">
              <i class="material-icons">bubble_chart</i>
              <p>categories</p>
            </a>
          </li>

          <li class="nav-item {{ is_active('skills') }}">
            <a class="nav-link" href="/admin/skills">
              <i class="material-icons">content_paste</i>
              <p>skills</p>
            </a>
          </li>
          <li class="nav-item {{ is_active('tags') }}">
            <a class="nav-link" href="/admin/tags">
             <i class="fa fa-tags"></i>
              <p>Tags</p>
            </a>
          </li>
          <li class="nav-item {{ is_active('pages') }}">
            <a class="nav-link" href="/admin/pages">
              <i class="material-icons">pages</i>              
              <p>Pages</p>
            </a>
          </li>
          <li class="nav-item {{ is_active('videos') }}">
            <a class="nav-link" href="/admin/videos">
              <i class="material-icons">video_library</i>
              <p>Videos</p>
            </a>
          </li>
          <li class="nav-item {{ is_active('messages') }}">
            <a class="nav-link" href="/admin/messages">
              <i class="material-icons">
              messages
              </i>
              <p>Messages</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
