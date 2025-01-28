  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('backend.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('backend.user.list') }}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        {{-- {{ route('backend.category.list') }} --}}
        <a class="nav-link collapsed" href="">
          <i class="bi bi-person"></i>
          <span>Category</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        {{-- {{ route('backend.blog.list') }} --}}
        <a class="nav-link collapsed" href="">
          <i class="bi bi-question-circle"></i>
          <span>Blog</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        {{-- {{ route('backend.help.list') }} --}}
        <a class="nav-link collapsed" href="">
          <i class="bi bi-envelope"></i>
          <span>Help</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        {{-- {{ route('backend.inbox.list') }} --}}
        <a class="nav-link collapsed" href="">
          <i class="bi bi-card-list"></i>
          <span>Inbox</span>
        </a>
      </li><!-- End Register Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->
