<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="assets/images/faces/face1.jpg" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">Library Millenium</span>
            <span class="text-secondary text-small">Admin Perpustakaan</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ url('/dashboard') }}">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Inventaris</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
          </a>
          <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('books.index') }}">Buku</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('acquisitions.index') }}">Data Perolehan</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('reductionbook.index') }}">Data Keluar</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('shelves.index') }}">Rak Buku</a></li>
              </ul>
          </div>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="{{ url('/borrowings') }}">
              <span class="menu-title">Peminjaman</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ url('/borrowingsdetails') }}">
              <span class="menu-title">Detail Peminjaman</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ url('/returndetails') }}">
              <span class="menu-title">Detail Pengembalian</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="{{ url('/majors') }}">
              <span class="menu-title">Jurusan</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ url('/classes') }}">
              <span class="menu-title">Kelas</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
      </li>

      {{-- <li class="nav-item">
          <a class="nav-link" href="{{ url('/reduction-books') }}">
              <span class="menu-title">Buku keluar</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
      </li> --}}

      <li class="nav-item">
          <a class="nav-link" href="/settings">
              <span class="menu-title">Setelan</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <span class="menu-title">Icons</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/forms/basic_elements.html">
          <span class="menu-title">Forms</span>
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <span class="menu-title">Charts</span>
          <i class="mdi mdi-chart-bar menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <span class="menu-title">Tables</span>
          <i class="mdi mdi-table-large menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Sample Pages</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item sidebar-actions">
        <span class="nav-link">
          <div class="border-bottom">
            <h6 class="font-weight-normal mb-3">Projects</h6>
          </div>
          <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
          <div class="mt-4">
            <div class="border-bottom">
              <p class="text-secondary">Categories</p>
            </div>
            <ul class="gradient-bullet-list mt-4">
              <li>Free</li>
              <li>Pro</li>
            </ul>
          </div>
        </span>
      </li>
    </ul>
  </nav>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
