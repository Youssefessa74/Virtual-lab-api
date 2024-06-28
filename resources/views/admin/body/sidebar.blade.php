<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Lab<span>Nerd</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{ url('admin/dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item nav-category">Project</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#type" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Quiz</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="type">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('questions.index') }}" class="nav-link">All Questions</a>
              </li>

            </ul>
          </div>

          <div class="collapse" id="type">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('all.subject') }}" class="nav-link">All Grades</a>
              </li>
            </ul>
          </div>


          <div class="collapse" id="type">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('all.element') }}" class="nav-link">All Element</a>
              </li>
            </ul>
          </div>
        </li>



        <li class="nav-item nav-category">Components</li>
        <li class="nav-item">

          <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Admin</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>

          <div class="collapse" id="admin">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="" class="nav-link">All Admins</a>
              </li>
            </li>
            </ul>
          </div>
          <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Roles & Permissions</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="" class="nav-link">All Permissions</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">All Roles</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Add Role & Permssions</a>
              </li>

              <li class="nav-item">
                <a href="" class="nav-link">All Role & Permssions</a>
              </li>

              <li class="nav-item nav-category"></li>

{{--
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                  <i class="link-icon" data-feather="anchor"></i>
                  <span class="link-title">Roles & Permissions</span>
                  <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                  <ul class="nav sub-menu">
                    <li class="nav-item">
                      <a href="{{route('all.permission')}}" class="nav-link">All Permissions</a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                    </li> --}}


        </li>
        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
          <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <nav class="settings-sidebar">
    <div class="sidebar-body">
      <a href="#" class="settings-sidebar-toggler">
        <i data-feather="settings"></i>
      </a>
      <div class="theme-wrapper">
        <h6 class="text-muted mb-2">Light Theme:</h6>
        <a class="theme-item" href="../demo1/dashboard.html">
          <img src="../assets/images/screenshots/light.jpg" alt="light theme">
        </a>
        <h6 class="text-muted mb-2">Dark Theme:</h6>
        <a class="theme-item active" href="../demo2/dashboard.html">
          <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
        </a>
      </div>
    </div>
  </nav>
