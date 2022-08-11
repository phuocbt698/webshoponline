 <!-- Sidebar Menu -->
 <nav class="mt-2">
     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
         <li class="nav-item">
             <a href="{{ route('category.index') }}" class="nav-link {{ $title == 'Category' ? 'active' : '' }}">
                 <i class="fas fa-th-list"></i>
                 <p>Category</p>
             </a>
         </li>
         <li class="nav-item {{ $title == 'Product' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link  {{ $title == 'Product' ? 'active' : '' }}">
                <i class="fab fa-product-hunt"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('attribute.index')}}" class="nav-link {{ (!empty($active) && $active == 'Attribute') ? 'active' : '' }}">
                    <i class="fas fa-info-circle"></i>
                  <p>Attribute</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link  {{ (!empty($active) && $active == 'Product') ? 'active' : '' }}">
                    <i class="fas fa-list-alt"></i>
                    <p>Product list</p>
                </a>
            </li>
            </ul>
          </li>
         <li class="nav-item">
             <a href="{{ route('admin.index') }}" class="nav-link {{ $title == 'User-admin' ? 'active' : '' }}">
                 <i class="fas fa-user-shield"></i>
                 <p>User admin</p>
             </a>
         </li>

         <li class="nav-item">
             <a href="{{ route('role.index') }}" class="nav-link {{ $title == 'Role' ? 'active' : '' }}">
                 <i class="fas fa-user-cog"></i>
                 <p>Role</p>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{ route('login.logout') }}" class="nav-link">
                 <i class="fas fa-sign-out-alt"></i>
                 <p>Logout</p>
             </a>
         </li>
     </ul>
 </nav>
 <!-- /.sidebar-menu -->
