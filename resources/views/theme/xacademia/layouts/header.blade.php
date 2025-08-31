<div class="header-main">
    @include('theme.xacademia.components.top-navbar')

    <style>
        .dropdown-mega .dropdown-menu {
            left: 0;
            right: 0;
        }

        #coreList button,
        #subList button {
            display: block;
            width: 100%;
            border: 0;
            background: transparent;
            text-align: left;
            padding: .4rem .5rem;
            border-radius: .3rem;
        }

        #coreList button:hover,
        #subList button:hover,
        #coreList button[aria-current="true"],
        #subList button[aria-current="true"] {
            background: #f1f3f9;
        }

        .course-card {
            border: 1px solid #dee2e6;
            border-radius: .5rem;
            padding: .75rem;
            background: #fff;
            height: 100%;
        }

        .course-card:hover {
            border-color: #0d6efd;
        }
    </style>

    <div class="header-main">
        <!-- Mobile Header -->
        <div class="sticky">
            <div class="horizontal-header clearfix ">
                <div class="container">
                    <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                    <span class="smllogo"><img src="{{ asset('theme/xacademia/assets/images/brand/logo12.png') }}"
                            width="120" alt="img" /></span>
                    <span class="smllogo-white"><img src="{{ asset('theme/xacademia/assets/images/brand/logo.png') }}"
                            width="120" alt="img" /></span>
                    <a href="tel:245-6325-3256" class="callusbtn"><i class="icon icon-phone" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- /Mobile Header -->

        <!--Horizontal-main -->
        <div class="horizontal-main header-style1 p-0 bg-dark-transparent clearfix">
            <div class="horizontal-mainwrapper container clearfix">
                <div class="desktoplogo">
                    <a href="{{ route('home') }}"><img
                            src="{{ asset('theme/xacademia/assets/images/brand/logo12.png') }}" alt="img">
                    </a>
                </div>
                <div class="desktoplogo-1">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('theme/xacademia/assets/images/brand/logo.png') }}" class="header-dark"
                            alt="img">
                        <img src="{{ asset('theme/xacademia/assets/images/brand/logo12.png') }}"
                            class="header-brand-img header-white" alt="logo">
                    </a>
                </div>
                <nav class="horizontalMenu clearfix d-md-flex">
                    <ul class="horizontalMenu-list">
                        {{-- <li aria-haspopup="true"><a href="javascript:void(0)">Course <span
                                    class="fe fe-chevron-down m-0"></span></a>
                            <ul class="sub-menu">
                                @foreach (menu_cataloge() as $category)
                                    <li aria-haspopup="true"><a
                                            href="javascript:void(0)">{{ $category->translation->name }} <i
                                                class="fa fa-angle-right float-end mt-1 d-none d-lg-block"></i></a>
                                        <ul class="sub-menu">
                                            @foreach ($category->courses as $course)
                                                <li aria-haspopup="true">
                                                    <a
                                                        href="{{ route('courses.show', ['category' => $category->slug, 'course' => $course->slug]) }}">{{ $course->translation->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li> --}}
                        <li class="nav-item dropdown dropdown-mega position-static">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Explore Courses
                            </a>

                            <div class="dropdown-menu w-100 shadow border-0 mt-0 p-3">
                                <div class="container">
                                    <div class="row">
                                        <!-- Categories -->
                                        <div class="col-12 col-md-3">
                                            <h6 class="text-uppercase small text-muted">Categories</h6>
                                            <ul id="coreList" class="list-unstyled"></ul>
                                        </div>

                                        <!-- Topics -->
                                        <div class="col-12 col-md-3">
                                            <h6 class="text-uppercase small text-muted">Topics</h6>
                                            <ul id="subList" class="list-unstyled"></ul>
                                        </div>

                                        <!-- Courses -->
                                        <div class="col-12 col-md-6">
                                            <h6 class="text-uppercase small text-muted">Courses</h6>
                                            <div id="coursesGrid" class="row g-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li aria-haspopup="true"><a href="{{ route('about') }}">About Us </a></li>
                        <li aria-haspopup="true"><a href="javascript:void(0)">Resource <span
                                    class="fe fe-chevron-down m-0"></span></a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true"><a href="javascript:void(0)">Blog </a>

                                </li>
                                <li aria-haspopup="true"><a href="javascript:void(0)">News </a>

                                </li>
                            </ul>
                        </li>
                        <li aria-haspopup="true"><a href="{{ route('contact') }}"> Contact Us</a></li>
                    </ul>
                    <ul class="mb-0">
                        <li aria-haspopup="true" class="d-none d-lg-block mt-2 top-postbtn">
                            <span><a class="btn btn-secondary" href="course-posts.html">Enquire Now</a></span>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div><!--/Horizontal-main -->
</div><!--/Horizontal-main -->

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function(){
  const catalog = {
    "Cybersecurity 🛡️": {
      emoji:"🛡️", subs:{
        "Ethical Hacking":["CEH","CompTIA PenTest+"],
        "SOC Analyst":["CompTIA CySA+","Threat Hunting"],
      }
    },
    "AI 🤖": {
      emoji:"🤖", subs:{
        "Machine Learning":["ML with Python","DL with TensorFlow"],
        "Prompt Engineering":["Prompt Mastery","Applied ChatGPT"],
      }
    }
  };

  let currentCore=null, currentSub=null;
  const coreList=document.getElementById("coreList");
  const subList=document.getElementById("subList");
  const coursesGrid=document.getElementById("coursesGrid");

  function btn(label,emoji=""){
    const b=document.createElement("button");
    b.type="button"; b.textContent=(emoji?" "+emoji+" ":"")+label;
    return b;
  }

  function renderCores(){
    coreList.innerHTML="";
    Object.keys(catalog).forEach(core=>{
      const li=document.createElement("li");
      const b=btn(core,catalog[core].emoji);
      b.onclick=()=>selectCore(core);
      li.appendChild(b); coreList.appendChild(li);
    });
  }

  function renderSubs(core){
    subList.innerHTML="";
    Object.keys(catalog[core].subs).forEach(sub=>{
      const li=document.createElement("li");
      const b=btn(sub);
      b.onclick=()=>selectSub(core,sub);
      li.appendChild(b); subList.appendChild(li);
    });
  }

  function renderCourses(core,sub){
    coursesGrid.innerHTML="";
    const list=catalog[core].subs[sub]||[];
    list.forEach(c=>{
      const col=document.createElement("div");
      col.className="col-12 col-md-6";
      col.innerHTML=`<div class="course-card"><strong>${c}</strong><br><small>${core} → ${sub}</small></div>`;
      coursesGrid.appendChild(col);
    });
  }

  function selectCore(core){
    currentCore=core;
    renderSubs(core);
    const first=Object.keys(catalog[core].subs)[0];
    if(first) selectSub(core,first);
  }
  function selectSub(core,sub){
    currentSub=sub;
    renderCourses(core,sub);
  }

  renderCores();
  selectCore(Object.keys(catalog)[0]);
});
</script>

@endpush
