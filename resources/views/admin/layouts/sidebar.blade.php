<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">

                    <a href="/admin" class="nav-link {{ isActive('admin.') }}">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>Control panel</p>
                    </a>
                </li>
                @canany(['show-user','create-user'])
                    <li class="nav-item {{ isActive(['admin.users.index' , 'admin.users.create'] , 'menu-open')}}">
                        <a class="nav-link {{ isActive(['admin.users.index','admin.users.create'])}}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        @can('show-user')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}"
                                       class="nav-link {{ isActive('admin.users.index')}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List of users</p>
                                    </a>
                                </li>
                            </ul>
                        @endcan

                        @can('create-user')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.create') }}"
                                       class="nav-link {{ isActive('admin.users.create')}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create new user</p>
                                    </a>
                                </li>
                            </ul>
                        @endcan
                    </li>
                @endcanany
                @canany(['show-permissions','show-roles'])
                    <li class="nav-item {{ isActive(['admin.permissions.index','admin.roles.index'] , 'menu-open')}}">
                        <a href="#" class="nav-link {{ isActive('admin.permissions.index','admin.roles.index')}}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Allow access
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        @can('show-roles')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}"
                                       class="nav-link {{ isActive('admin.roles.index')}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All the rules</p>
                                    </a>
                                </li>
                            </ul>
                        @endcan

                        @can('show-permissions')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.index') }}"
                                       class="nav-link {{ isActive('admin.permissions.index')}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All the access</p>
                                    </a>
                                </li>
                            </ul>
                        @endcan
                    </li>
                @endcanany
                    <li class="nav-item {{ isActive(['admin.permissions.index','admin.roles.index'] , 'menu-open')}}">
                        <a href="#" class="nav-link {{ isActive('admin.permissions.index','admin.roles.index')}}">
                            <i class="nav-icon fa fa-edit "></i>
                            <p>
                                Products
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.products.index') }}"
                                       class="nav-link {{ isActive('admin.products.index')}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All products</p>
                                    </a>
                                </li>
                            </ul>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
