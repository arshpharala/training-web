<div class="sidebar sidebar-light sidebar-xl sidebar-end sidebar-overlaid border-start d-flex flex-column"
  id="aside-content">


    <div class="sidebar-header p-0 position-relative">
      <ul class="nav nav-underline-border w-100" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-coreui-toggle="tab" href="#timeline" role="tab">
            Title
          </a>
        </li>
      </ul>
      <button class="btn-close position-absolute top-50 end-0 translate-middle my-0" type="button" aria-label="Close"
        onclick="coreui.Sidebar.getInstance(document.querySelector('#aside-content')).toggle()"></button>
    </div>

    <!-- Scrollable content -->
    <div class="tab-content flex-grow-1 overflow-auto">
      <div class="tab-pane active p-3" id="timeline" role="tabpanel">
        <div class="row">
          <div class="col-md-12">

          </div>
        </div>

      </div>
    </div>

    <!-- Footer with fixed buttons -->
    <div class="sidebar-footer p-3 border-top bg-white">
      <div class="d-flex justify-content-between">
        <button class="btn btn-secondary me-2" type="button"
          onclick="coreui.Sidebar.getInstance(document.querySelector('#aside-content')).toggle()">Cancel</button>
      </div>
    </div>

</div>


<button type="button" id="open-aside-button" style="display: none"
  onclick="coreui.Sidebar.getInstance(document.querySelector('#aside-content')).show()"></button>
