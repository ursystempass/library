<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
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
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-anggota" aria-expanded="false"
                aria-controls="ui-basic-anggota">
                <span class="menu-title">Anggota</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic-anggota">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}">Siswa</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('users.admin') }}">Pengurus</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('classes.index') }}">Kelas</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('majors.index') }}">Jurusan</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('books') }}">
                <span class="menu-title">Buku</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('borrowings') }}">
                <span class="menu-title">Peminjaman</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('redets') }}">
                <span class="menu-title">   Pengembalian</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('detect-scan') }}">
                <span class="menu-title">Pinjam Langsung</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('reserv-scan') }}">
                <span class="menu-title">Pinjam Reservasi</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/settings">
                <span class="menu-title">Setelan</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">

        </li>
        <li class="nav-item sidebar-actions">
            <span class="nav-link">

          <li class="nav-item">
            <a class="nav-link" href="#" id="logout-button">
                Logout
            </a>
            <!-- Form untuk logout -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        </span>
        </li>
    </ul>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    // Tambahkan event listener untuk tombol logout
    document.getElementById('logout-button').addEventListener('click', function(event) {
        // Hentikan aksi default dari link
        event.preventDefault();

        // Tampilkan SweetAlert untuk konfirmasi logout
        swal({
            title: "Logout",
            text: "Apakah Anda yakin ingin keluar?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willLogout) => {
            if (willLogout) {
                // Jika pengguna mengklik OK, kirimkan form logout
                document.getElementById('logout-form').submit();
            } else {
                // Jika pengguna mengklik Cancel, tutup SweetAlert
                swal("Logout dibatalkan.", {
                    icon: "info",
                });
            }
        });
    });

    // Fungsi untuk mengarahkan pengguna ke halaman utama setelah logout
    function redirectAfterLogout() {
        window.location.href = "/"; // Ubah "/home" sesuai dengan rute yang diinginkan
    }

    // Panggil fungsi redirectAfterLogout setelah logout berhasil
    @if(session('status') == 'logout')
        redirectAfterLogout();
    @endif
</script>
