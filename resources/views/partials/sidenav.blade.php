<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand" href="{{ url('admin') }}">
        <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
      </a>
      <div class="ml-auto">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link{{ (request()->is('admin')) ? ' active' : '' }}" href="{{ url('admin') }}">
              <i class="ni ni-shop text-green"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ (request()->is('admin/students') || request()->is('admin/rombels')) ? ' active' : '' }}" href="#navbar-students" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-students">
              <i class="ni ni-single-02 text-primary"></i>
              <span class="nav-link-text">Data Siswa</span>
            </a>
            <div class="collapse" id="navbar-students">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ url('admin/students') }}" class="nav-link">Siswa</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/rombels') }}" class="nav-link">Rombel</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ (request()->is('admin/spp')) ? ' active' : '' }}" href="{{ url('admin/spp') }}">
              <i class="ni ni-chart-pie-35 text-danger"></i>
              <span class="nav-link-text">Data SPP</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ (request()->is('admin/transactions')) ? ' active' : '' }}" href="{{ url('admin/transactions') }}">
              <i class="ni ni-map-big text-warning"></i>
              <span class="nav-link-text">Transaksi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ (request()->is('admin/invoice/*')) ? ' active' : '' }}" href="#navbar-invoice" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-invoice">
              <i class="ni ni-archive-2 text-info"></i>
              <span class="nav-link-text">Invoice</span>
            </a>
            <div class="collapse" id="navbar-invoice">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ url('admin/invoice/waiting') }}" class="nav-link">Waiting Payment</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/invoice/success') }}" class="nav-link">Success Payment</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/invoice/failed') }}" class="nav-link">Failed</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">Admin Navigation</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/data')) ? 'active' : '' }}" href="{{ url('admin/data') }}">
              <i class="ni ni-user-run"></i>
              <span class="nav-link-text">Officer</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/roles')) ? 'active' : '' }}" href="{{ url('admin/roles') }}">
              <i class="ni ni-chart-bar-32"></i>
              <span class="nav-link-text">Roles</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/settings')) ? 'active' : '' }}" href="{{ url('admin/settings') }}">
              <i class="ni ni-ui-04"></i>
              <span class="nav-link-text">Settings</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/notifications')) ? 'active' : '' }}" href="{{ url('admin/notifications') }}">
              <i class="ni ni-bell-55"></i>
              <span class="nav-link-text">Notifications</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/log')) ? 'active' : '' }}" href="{{ url('admin/log') }}">
              <i class="ni ni-book-bookmark"></i>
              <span class="nav-link-text">Log Activity</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>