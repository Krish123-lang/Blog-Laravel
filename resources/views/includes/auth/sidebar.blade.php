  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'dashboard') collapsed @endif" href="{{ route('backend.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      @if (Auth::user()->is_admin == 1)
        <li class="nav-item">
          <a class="nav-link  @if(Request::segment(2) != 'user') collapsed @endif" href="{{ route('backend.user.list') }}">
            <i class="bi bi-person"></i>
            <span>Users</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link  @if(Request::segment(2) != 'category') collapsed @endif" href="{{ route('backend.category.list') }}">
            <i class="bi bi-person"></i>
            <span>Category</span>
          </a>
        </li>
      @endif

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) != 'blog') collapsed @endif" href="{{ route('backend.blog.list') }}">
          <i class="bi bi-question-circle"></i>
          <span>Blog</span>
        </a>
      </li>

      @if (Auth::user()->is_admin == 1)
        <li class="nav-item">
          <a class="nav-link @if(Request::segment(2) != 'page') collapsed @endif" href="{{ route('backend.pages.list') }}">
            <i class="bi bi-question-circle"></i>
            <span>Page</span>
          </a>
        </li>
        @endif
        
        <li class="nav-item">
          <a class="nav-link @if(Request::segment(2) != 'change-password') collapsed @endif" href="{{ route('backend.pages.change_password') }}">
            <i class="bi bi-key"></i>
            <span>Change Password</span>
          </a>
        </li>
    </ul>

  </aside>
