<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
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
                    <i class="fas fa-home menu-icon"></i> <!-- Icon Home -->
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-anggota" aria-expanded="false"
                    aria-controls="ui-basic-anggota">
                    <span class="menu-title">Anggota</span>
                    <i class="menu-arrow"></i>
                    <i class="fas fa-users menu-icon"></i>
                </a>
                <div class="collapse" id="ui-basic-anggota">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <i class="fas fa-user-graduate"></i> <!-- Icon Siswa -->
                                Siswa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('classes.index') }}">
                                <i class="fas fa-chalkboard"></i> <!-- Icon Kelas -->
                                Kelas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('majors.index') }}">
                                <i class="fas fa-book"></i> <!-- Icon Jurusan -->
                                Jurusan
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('books') }}">
                    <span class="menu-title">Buku</span>
                    <i class="fas fa-book menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('borrowings') }}">
                    <span class="menu-title">Peminjaman</span>
                    <i class="fas fa-handshake menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('rebacks') }}">
                    <span class="menu-title">Pengembalian</span>
                    <i class="fas fa-undo-alt menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/settings">
                    <span class="menu-title">Setelan</span>
                    <i class="fas fa-cog menu-icon"></i>
                </a>
            </li>

            <li class="nav-item sidebar-actions">
                <a class="nav-link" href="#" id="logout-button">
                    <span>Logout</span>
                    <i class="fas fa-sign-out-alt menu-icon"></i>
                </a>
                <!-- Form untuk logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert JS -->
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
</body>
</html>
