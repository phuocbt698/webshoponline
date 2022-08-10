 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="{{route('admin.index')}}" class="nav-link {{($title == 'User-admin') ? 'active' : ''}}">
            <i class="fas fa-user-shield"></i>
            <p>User admin</p>
        </a>
      </li>     
      <li class="nav-item">
        <a href="{{route('role.index')}}" class="nav-link {{($title == 'Role') ? 'active' : ''}}">
            <i class="fas fa-user-cog"></i>
            <p>Role</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('login.logout')}}" class="nav-link">
          <i class="fas fa-sign-out-alt"></i>
            <p>Logout</p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->