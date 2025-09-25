<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
  <div class="sidebar-header border-bottom">
    <div class="sidebar-brand">
      <svg class="sidebar-brand-full" width="110" height="32" alt="CoreUI Logo">
        <use xlink:href="{{ asset('theme/coreui/assets/brand/coreui.svg#full') }}"></use>
      </svg>
      <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
        <use xlink:href="{{ asset('theme/coreui/assets/brand/coreui.svg#signet') }}"></use>
      </svg>
    </div>
    <button
      class="btn-close d-lg-none"
      type="button"
      data-coreui-theme="dark"
      aria-label="Close"
      onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"
    ></button>
  </div>

  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
        </svg>
        Dashboard
      </a>
    </li>

    <li class="nav-divider"></li>
    <li class="nav-title">Sales</li>
    <li class="nav-group">
      <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-cart') }}"></use>
        </svg>
        Sales
      </a>
      <ul class="nav-group-items">
        <li class="nav-item">
          <a class="nav-link" href="#"><span class="nav-icon"></span>Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><span class="nav-icon"></span>Invoices</a>
        </li>
      </ul>
    </li>

    <li class="nav-divider"></li>
    <li class="nav-title">Countries Manage</li>
    <li class="nav-group">
      <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-globe-alt') }}"></use>
        </svg>
        Locations
      </a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cms.countries.index') }}">Countries</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cms.states.index') }}">States</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cms.cities.index') }}">Cities</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cms.venues.index') }}">Venues</a></li>
      </ul>
    </li>

    <li class="nav-divider"></li>
    <li class="nav-title">Catalog</li>
    <li class="nav-group">
      <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-book') }}"></use>
        </svg>
        Catalog
      </a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.catalog.categories.index') }}">Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.catalog.topics.index') }}">Topics</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.catalog.courses.index') }}">Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.catalog.delivery-methods.index') }}">Delivery Methods</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.catalog.exams.index') }}">Exams</a></li>
      </ul>
    </li>

    <li class="nav-divider"></li>
    <li class="nav-title">CMS</li>
    <li class="nav-group">
      <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-file') }}"></use>
        </svg>
        CMS
      </a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cms.pages.index') }}">Pages</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cms.statistics.index') }}">Statistics</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cms.news.index') }}">News</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cms.testimonials.index') }}">Testimonials</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cms.partners.index') }}">Partners</a></li>
      </ul>
    </li>

    <li class="nav-divider"></li>
    <li class="nav-title">Settings</li>
    <li class="nav-group">
      <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
        </svg>
        Settings
      </a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cms.locales.index') }}">Locales</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.cms.settings.index') }}">Configuration</a></li>
      </ul>
    </li>

    <li class="nav-divider"></li>
    <li class="nav-item">
      <form method="POST" action="{{ route('admin.logout') }}" id="logout-form">
        @csrf
        <a
          href="#"
          class="nav-link"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        >
          <svg class="nav-icon">
            <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
          </svg>
          Logout
        </a>
      </form>
    </li>
  </ul>

  <div class="sidebar-footer border-top d-none d-lg-flex">
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
  </div>
</div>
