
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('images/backend/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    
    <div class="sidebar">
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/backend/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->roles->pluck('name') }}</a>
            </div>
        </div>

        
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-header">{{ __('PRODUCTS') }}</li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>{{ __('Products') }}</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('admin.types.index') }}" class="nav-link">
                        <i class="nav-icon far fa-file"></i>
                        <p>{{ __('Types of Products') }}</p>
                    </a>
                </li>
                <li class="nav-header">{{ __('CONTENT') }}</li>
                @can('view posts')
                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>{{ __('Posts') }}</p>
                    </a>
                </li>
                @endcan
                @can('view categories')
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>{{ __('Categories') }}</p>
                    </a>
                </li>
                @endcan

                <li class="nav-header">{{ __('SETTINGS') }}</li>
                @can('view admins')
                <li class="nav-item">
                    <a href="{{ route('admin.admins.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>{{ __('Administrators') }}</p>
                    </a>
                </li>
                @endcan
                @can('view roles')
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>{{ __('Roles') }}</p>
                    </a>
                </li>
                @endcan
                @can('view permissions')
                <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-times"></i>
                        <p>{{ __('Permissions') }}</p>
                    </a>
                </li>
                @endcan
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="{{ route('admin.activities.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>{{ __('Activity Log') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
