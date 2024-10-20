  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link text-center" style="text-decoration: none;">
      {{-- <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <i class="fa fa-paw"></i>
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @php
            $profile = \Modules\Setting\Entities\CompanyProfile::first();
          @endphp
          <img src="{{ asset('upload/images/settings/'.$profile->logo) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('home') }}" class="d-block" style="text-decoration: none;">{{ $profile->company_name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 mb-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{ request()->routeIs('home') ? 'menu-open' : '' }}">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>

          @can('access_user_management')
          <li class="nav-item {{ request()->routeIs('users.*','roles.*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link" {{ request()->routeIs('users.*','roles.*') ? 'active' : '' }}>
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link {{ request()->routeIs('users.create') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Create Users</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          
          @can('access_sliders')
          <li class="nav-item {{ request()->routeIs('sliders.*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link" {{ request()->routeIs('sliders.*') ? 'active' : '' }}>
              <i class="nav-icon fas fa-image"></i>
              <p>
                Sliders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sliders.index') }}" class="nav-link {{ request()->routeIs('sliders.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sliders.create') }}" class="nav-link {{ request()->routeIs('sliders.create') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Create Sliders</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('access_sliders')
          <li class="nav-item {{ request()->routeIs('services.*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link" {{ request()->routeIs('services.*') ? 'active' : '' }}>
              <i class="nav-icon fas fa-image"></i>
              <p>
                services
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('services_category.index') }}" class="nav-link {{ request()->routeIs('services_category.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>services</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('access_blogs')
          <li class="nav-item {{ request()->routeIs('blogs.*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link" {{ request()->routeIs('blogs.*') ? 'active' : '' }}>
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Blogs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('blogs.index') }}" class="nav-link {{ request()->routeIs('blogs.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('blogs.create') }}" class="nav-link {{ request()->routeIs('blogs.create') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Create Blogs</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('access_blogs')
          <li class="nav-item {{ request()->routeIs('expenses.*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link" {{ request()->routeIs('expenses.*') ? 'active' : '' }}>
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Expenses
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('expenses.index') }}" class="nav-link {{ request()->routeIs('expenses.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Expenses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('expenses.create') }}" class="nav-link {{ request()->routeIs('expenses.create') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Create expenses</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('access_advertisements')
          <li class="nav-item {{ request()->routeIs('advertisements.*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link" {{ request()->routeIs('advertisements.*') ? 'active' : '' }}>
              <i class="nav-icon fas fa-image"></i>
              <p>
                Advertisements
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('advertisements.index') }}" class="nav-link {{ request()->routeIs('advertisements.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Advertisements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('advertisements.create') }}" class="nav-link {{ request()->routeIs('advertisements.create') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Create Advertisements</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('access_teams')
          <li class="nav-item {{ request()->routeIs('teams.*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link" {{ request()->routeIs('teams.*') ? 'active' : '' }}>
              <i class="nav-icon fas fa-user"></i>
              <p>
                Teams
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('teams.index') }}" class="nav-link {{ request()->routeIs('teams.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Teams</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('teams.create') }}" class="nav-link {{ request()->routeIs('teams.create') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Create Teams</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('access_faqs')
          <li class="nav-item {{ request()->routeIs('faqs.*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link" {{ request()->routeIs('faqs.*') ? 'active' : '' }}>
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
                FAQs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('faqs.index') }}" class="nav-link {{ request()->routeIs('faqs.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>FAQs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('faqs.create') }}" class="nav-link {{ request()->routeIs('faqs.create') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Create FAQs</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('access_testimonials')
          <li class="nav-item {{ request()->routeIs('testimonials.*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link" {{ request()->routeIs('testimonials.*') ? 'active' : '' }}>
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Testimonial
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('testimonials.index') }}" class="nav-link {{ request()->routeIs('testimonials.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Testimonials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('testimonials.create') }}" class="nav-link {{ request()->routeIs('testimonials.create') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Create Testimonials</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan

          @can('access_vacancies')
          <li class="nav-item {{ request()->routeIs('vacancies.*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link" {{ request()->routeIs('vacancies.*') ? 'active' : '' }}>
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Vacancies
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('vacancies.index') }}" class="nav-link {{ request()->routeIs('vacancies.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Vacancies</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('vacancies.create') }}" class="nav-link {{ request()->routeIs('vacancies.create') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Create Vacancy</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
            <li class="nav-item">
              <a href="{{ route('galleries.index') }}" class="nav-link {{ request()->routeIs('galleries.index') ? 'active' : '' }}">
                <i class="far fa-image nav-icon"></i>
                <p>Gallery</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('inquires.index') }}" class="nav-link {{ request()->routeIs('inquires.index') ? 'active' : '' }}">
                <i class="far fa-address-book nav-icon"></i>
                <p>Inquiries</p>
              </a>
            </li>
          @can('access_settings')
          <li class="nav-item {{ request()->routeIs('company.*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link" {{ request()->routeIs('company.*') ? 'active' : '' }}>
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('company.index') }}" class="nav-link {{ request()->routeIs('company.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Company Profile</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('whyus.index') }}" class="nav-link {{ request()->routeIs('whyus.index') ? 'active' : '' }}">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>Why Choose Us</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>