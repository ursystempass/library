<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.head')
</head>

<body>
    <div class="container-scroller">
        <!-- Include navbar -->
        @include('layouts.partials.navbar')

        <div class="container-fluid page-body-wrapper">
            <!-- Include sidebar -->
            @include('layouts.partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-library-books"></i>
                            </span> Perpustakaan SMK NEGERI 1 CIBINONG
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder text-white">
                                <div class="card-body">
                                    <h4 class="font-weight-normal mb-3">Buku <i class="mdi mdi-book-open-page-variant mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5" style="font-size: 18px;">250 <br> tersedia</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-gradient-info card-img-holder text-white">
                                <div class="card-body">
                                    <h4 class="font-weight-normal mb-3">Anggota <i class="mdi mdi-account-group mdi-24px float-right"></i></h4>
                                    <h2 class="mb-5" style="font-size: 18px;">15 <br> terdaftar</h2>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white">
                                <div class="card-body">
                                    <h4 class="font-weight-normal mb-2" style="font-size: 18px;">Peminjaman Buku<i class="mdi mdi-book-open mdi-24px float-right"></i></h4>
                                    <h2 class="mb-5" style="font-size: 18px;">70 <br> terpinjam</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-gradient-warning card-img-holder text-white">
                                <div class="card-body">
                                    <h4 class="font-weight-normal mb-2" style="font-size: 18px;">Pengembalian Buku<i class="mdi mdi-reply mdi-24px float-right"></i></h4>
                                    <h2 class="mb-5" style="font-size: 18px;">20 <br> dikembalikan</h2>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Peminjaman Buku</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> User </th>
                                                    <th> Nama buku </th>
                                                    <th> Status </th>
                                                    <th> Tanggal Peminjaman </th>
                                                    <th> Tanggal Pengembalian</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> Nevityas </td>
                                                    <td> Buku Bahasa indonesia </td>
                                                    <td>
                                                        <label class="badge badge-gradient-success">Selesai</label>
                                                    </td>
                                                    <td> 12 November 2023 </td>
                                                    <td> 15 November 2023</td>
                                                </tr>
                                                <tr>
                                                    <td> Dinda </td>
                                                    <td> Novel Hujan</td>
                                                    <td>
                                                        <label class="badge badge-gradient-warning">Dipinjam</label>
                                                    </td>
                                                    <td> 15 Desember 2023 </td>
                                                    <td> - </td>
                                                </tr>
                                                <tr>
                                                    <td> Dela </td>
                                                    <td> Kamus bahasa inggris </td>
                                                    <td>
                                                        <label class="badge badge-gradient-info">Dipinjam</label>
                                                    </td>
                                                    <td> 20 Desember 2023 </td>
                                                    <td> - </td>
                                                </tr>
                                                <tr>
                                                    <td> Rahma </td>
                                                    <td> Buku Pelajaran Matematika</td>
                                                    <td>
                                                        <label class="badge badge-gradient-danger">Telat</label>
                                                    </td>
                                                    <td> 25 Desember 2023 </td>
                                                    <td> 1 Januari 2024 </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">SMK NEGERI 1 CIBINONG</h4>
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                                                <i class="mdi mdi-account-outline icon-sm me-2"></i>
                                                <span>Admin SMK 1 CIBINONG</span>
                                            </div>
                                            <div class="d-flex align-items-center text-muted font-weight-light">
                                                <i class="mdi mdi-clock icon-sm me-2"></i>
                                                <span>5 Maret 2024</span>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-5 align-items-top">
                                            <div class="mb-0 flex-grow">
                                                <h5 class="me-2 mb-2">Perpustakaan SMK NEGERI 1 CIBINONG.</h5>
                                                <p class="mb-0 font-weight-light">It is a long established fact that a
                                                    reader will be distracted by the readable content of a page.</p>
                                            </div>
                                            <div class="ms-auto">
                                                <i class="mdi mdi-heart-outline text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
