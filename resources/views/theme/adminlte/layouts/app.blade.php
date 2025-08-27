<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {!! render_meta_tags($meta ?? null) !!}

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('theme/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('theme/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet"
    href="{{ asset('theme/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('theme/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('theme/adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet"
    href="{{ asset('theme/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- SweetAlert2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('theme/adminlte/dist/css/adminlte.min.css') }}">

  <style>
    .tox-editor-header .tox-promotion-button {
      display: none !important;
    }

    .select2-selection__choice, .select2-results__option.select2-results__option--highlighted {
      background-color: #6c757d !important;
    }
  </style>

  @stack('head')

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    @include('theme.adminlte.layouts.navbar')
    @include('theme.adminlte.layouts.sidebar')

    <div class="content-wrapper">

      @hasSection('content-header')
        <div class="content-header">
          <div class="container-fluid">
            @yield('content-header')
          </div>
        </div>
      @endif


      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
    </div>


    @include('theme.adminlte.layouts.footer')

    @include('theme.adminlte.layouts.right-sidebar')

  </div>



  <!-- jQuery -->
  <script src="{{ asset('theme/adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('theme/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  {{-- <script src="{{ asset('theme/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('theme/adminlte/dist/js/adminlte.min.js') }}"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('theme/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('theme/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('theme/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('theme/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('theme/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('theme/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('theme/adminlte/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('theme/adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('theme/adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('theme/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('theme/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('theme/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <!-- Select2 -->
  <script src="{{ asset('theme/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>

  <script src="https://cdn.tiny.cloud/1/{{ setting('tinymc_key', 'argmcqho3vhasvso2kbt1f989ll0a9es3fixj7mrb79ndhka') }}/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea.tinymce-editor',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak table code fullscreen',
      toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code fullscreen',
      images_upload_url: "{{ route('admin.cms.upload.tinymce', ['_token' => csrf_token()]) }}",
      images_upload_credentials: true,
      height: 400,
      branding: false,
      relative_urls: false,
      remove_script_host: false,
      convert_urls: true,
      promotion: false
      // Use the default TinyMCE handler (no need for custom images_upload_handler!)
    });
    $(document).ready(function() {
        $('.select2').select2({
            theme: "bootstrap4",
            allowClear: true
        });
    });
  </script>



  <!-- Custom JS -->
  <script src="{{ asset('assets/js/form.js') }}"></script>
  <script src="{{ asset('assets/js/navbar.js') }}"></script>

  @stack('scripts')
</body>

</html>
