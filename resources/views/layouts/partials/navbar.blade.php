


<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="index.html"><img src="images/setting/OIP.jpg" alt="" title="" style="max-width:50px; height:50px" /></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <div class="search-field d-none d-md-block">
      <form class="d-flex align-items-center h-100" action="#">
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>
          </div>
        </div>
      </form>
    </div>
    <ul class="navbar-nav navbar-nav-right">
    <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- Tambahkan ikon untuk profil -->
            <div class="nav-profile-text">
                <p class="mb-1 text-black">{{ auth()->user()->name }}</p>
                <!-- Ikon profil -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                    <circle cx="12" cy="7" r="4"></circle>
                    <path d="M2 20c0-6 4-10 10-10s10 4 10 10"></path>
                </svg>
            </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{ route('profile.show') }}"> <!-- Tambahkan rute profil -->
                <i class="mdi mdi-cached me-2 text-success"></i> Profile
            </a>
        </div>
    </li>
    <li class="nav-item d-none d-lg-block full-screen-link">
        <a class="nav-link">
            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
        </a>
    </li>
    <!-- Tambahkan menu lainnya di sini jika diperlukan -->
</ul>

    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>
