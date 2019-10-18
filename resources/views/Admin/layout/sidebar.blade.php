<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Biz</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li @if ($pageSlug == 'dashboard') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <li @if ($pageSlug == 'destination') class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="{{route('admin.destination')}}">
          <i class="fas fa-umbrella-beach fa-tachometer-alt"></i>
          <span>Destination</span></a>
      </li>
    </ul>
    <!-- End of Sidebar -->