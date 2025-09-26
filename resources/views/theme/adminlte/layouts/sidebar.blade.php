  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link text-center">
          {{-- <img src="{{ asset('theme/adminlte/dist/img/AdminLTELogo.png') }}" alt="Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
          <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('theme/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->user()->name }}</a>
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
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-shopping-bag"></i>
                          <p>
                              Sales
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Orders</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Invoices</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link"><i class="nav-icon fas fa-globe"></i>
                          <p>Countries Manage<i class="right fas fa-angle-left"></i></p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.cms.countries.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Countries</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.cms.states.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>States</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.cms.cities.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cities</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.cms.venues.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Venues</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-shopping-bag"></i>
                          <p>
                              Catalog
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.catalog.categories.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Categories</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.catalog.topics.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Topics</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.catalog.courses.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Courses</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.catalog.delivery-methods.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Delivery Methods</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.catalog.exams.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Exams</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-file-alt"></i>
                          <p>
                              CMS
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.cms.pages.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pages</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.cms.statistics.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Statistics</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.cms.news.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>News</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="{{ route('admin.cms.testimonials.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Testimonials</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.cms.partners.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Partners</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-shopping-bag"></i>
                          <p>
                              Setting
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.cms.locales.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Locale</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.cms.settings.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Configuration</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <form method="POST" action="{{ route('admin.logout') }}" id="logout-form">
                          @csrf
                          <a href="#" class="nav-link"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="nav-icon fas fa-sign-out-alt"></i>
                              <p>Logout</p>
                          </a>
                      </form>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
