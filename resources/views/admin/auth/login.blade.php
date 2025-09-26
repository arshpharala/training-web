<!DOCTYPE html>
<html lang="en">
<head>
  <base href="./">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="Login">
  <title>{{ config('app.name') }} | Login</title>

  <!-- CoreUI CSS -->
  <link href="{{ asset('theme/coreui/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/coreui/vendors/simplebar/css/simplebar.css') }}" rel="stylesheet">
  <script src="{{ asset('theme/coreui/js/config.js') }}"></script>
  <script src="{{ asset('theme/coreui/js/color-modes.js') }}"></script>
</head>
<body>
  <div class="min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card-group d-block d-md-flex row">

            <!-- Login Card -->
            <div class="card col-md-7 p-4 mb-0">
              <div class="card-body">
                <h1>{{ __('Login') }}</h1>
                <p class="text-body-secondary">{{ __('Sign in to start your session') }}</p>

                @if (session('status'))
                  <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}">
                  @csrf

                  <!-- Email -->
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      <svg class="icon"><use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use></svg>
                    </span>
                    <input type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           placeholder="{{ __('Email') }}" required autofocus autocomplete="username">
                    @error('email')
                      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>

                  <!-- Password -->
                  <div class="input-group mb-4">
                    <span class="input-group-text">
                      <svg class="icon"><use xlink:href="{{ asset('theme/coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use></svg>
                    </span>
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ __('Password') }}" required autocomplete="current-password">
                  </div>

                  <!-- Remember + Login -->
                  <div class="row">
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                      </div>
                    </div>
                    <div class="col-6 text-end">
                      <button type="submit" class="btn btn-primary px-4">{{ __('Login') }}</button>
                    </div>
                  </div>
                </form>

                <!-- Forgot Password -->
                @if (Route::has('admin.password.request'))
                  <div class="mt-3">
                    <a class="btn btn-link px-0" href="{{ route('admin.password.request') }}">
                      {{ __('Forgot your password?') }}
                    </a>
                  </div>
                @endif
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CoreUI JS -->
  <script src="{{ asset('theme/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
  <script src="{{ asset('theme/coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>
</body>
</html>
