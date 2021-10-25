    <!-- Sidebar -->
    <ul class="pr-0 navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
          <div class="sidebar-brand-icon">
            <img style="width:70%" src="{!! asset('logo.png') !!}"> 
          </div>
        </a>
  
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
  
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Statistics</span></a>
        </li>
  
        <!-- Divider -->
        <hr class="sidebar-divider">
  
  
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/channels') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('channels.index') }}">
          <i class="fas fa-user-lock"></i>
            <span>Permissions</span>
          </a>
        </li>
  
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/channels/blocked*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('channels.blocked') }}">
          <i class="fas fa-lock"></i>
            <span>Blocked Channels</span>
          </a>
        </li>
  
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/allChannels*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('channels.all') }}">
          <i class="fas fa-film"></i>
            <span>Channels</span>
          </a>
        </li>
  
  
  
        <!-- Nav Item - Charts -->
        <li class="nav-item {{ request()->is('admin/MostViewedVideos*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('most.viewed.video') }}">
          <i class="fas fa-table"></i>
            <span>Most Watched Videos</span></a>
        </li>
  
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
  
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
  
      </ul>
      <!-- End of Sidebar -->