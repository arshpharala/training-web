<div class="container-fluid px-4 border-bottom">
  <button class="header-toggler" type="button"
    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px">
    <svg class="icon icon-lg">
      <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
    </svg>
  </button>

  <ul class="header-nav d-none d-md-flex ms-auto">
  </ul>
  <ul class="header-nav ms-auto ms-md-0">
    <li class="nav-item py-1">
      <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
    </li>

    <li class="nav-item dropdown">
      <button class="btn btn-link nav-link" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
        <svg class="icon icon-lg theme-icon-active">
          <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}"></use>
        </svg>
      </button>
      <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
        <li>
          <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
            <svg class="icon icon-lg me-3">
              <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-sun') }}"></use>
            </svg><span data-coreui-i18n="light">Light</span>
          </button>
        </li>
        <li>
          <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
            <svg class="icon icon-lg me-3">
              <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-moon') }}"></use>
            </svg><span data-coreui-i18n="dark"> Dark</span>
          </button>
        </li>
        <li>
          <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
            <svg class="icon icon-lg me-3">
              <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}"></use>
            </svg>Auto
          </button>
        </li>
      </ul>
    </li>
    <li class="nav-item py-1">
      <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
    </li>
    <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
        aria-haspopup="true" aria-expanded="false">
        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('theme/coreui/assets/img/avatars/9.jpg') }}"
            alt="{{ auth()->user()->name }}"></div>
      </a>
      <div class="dropdown-menu dropdown-menu-end pt-0">
        <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2"
          data-coreui-i18n="account">Account</div>

        <a class="dropdown-item" href="#">
          <svg class="icon me-2">
            <use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}">
            </use>
          </svg><span data-coreui-i18n="logout">Logout</span>
        </a>



    </li>
  </ul>

</div>
