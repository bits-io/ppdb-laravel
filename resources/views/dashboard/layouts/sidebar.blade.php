<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{ Request::is('students') ? 'active' : '' }}" href="/students">
            <span data-feather="users"></span>
              Students
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('registration') ? 'active' : '' }}" href="/registration">
            <span data-feather="file-text"></span>
              Pendaftaran
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file"></span>
              Pembayaran
          </a>
        </li>
      </ul>

    </div>
</nav>
