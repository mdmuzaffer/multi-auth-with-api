  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if(auth()->user()->role =='1')

      <li class="nav-item">
        <a class="nav-link collapsed " href="department.html">
          <i class="bi bi-person"></i>
          <span>Department</span>
          
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="doctors.html">
          <i class="bi bi-question-circle"></i>
          <span>Doctors</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="intern.html">
          <i class="bi bi-envelope"></i>
          <span>Intern</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="patient.html">
          <i class="bi bi-card-list"></i>
          <span>Patient</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="push-notification.html">
          <i class="bi bi-dash-circle"></i>
          <span>Push Notification</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="Managment.html">
          <i class="bi bi-file-earmark"></i>
          <span>Managment</span>
        </a>
      </li><!-- End Blank Page Nav -->

      @endif

    </ul>

  </aside>