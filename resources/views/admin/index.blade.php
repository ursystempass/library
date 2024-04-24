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
                                    <h2 class="mb-5" style="font-size: 18px;">{{ $jumlahBuku }} <br> tersedia</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-gradient-info card-img-holder text-white">
                                <div class="card-body">
                                    <h4 class="font-weight-normal mb-3">Anggota <i class="mdi mdi-account-group mdi-24px float-right"></i></h4>
                                    <h2 class="mb-5" style="font-size: 18px;">{{ $jumlahAnggota }} <br> terdaftar</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white">
                                <div class="card-body">
                                    <h4 class="font-weight-normal mb-2" style="font-size: 18px;">Peminjaman Buku<i class="mdi mdi-book-open mdi-24px float-right"></i></h4>
                                    <h2 class="mb-5" style="font-size: 18px;">{{ $jumlahPeminjaman }} <br> terpinjam</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card bg-gradient-warning card-img-holder text-white">
                                <div class="card-body">
                                    <h4 class="font-weight-normal mb-2" style="font-size: 18px;">Pengembalian Buku<i class="mdi mdi-reply mdi-24px float-right"></i></h4>
                                    <h2 class="mb-5" style="font-size: 18px;">{{ $jumlahPengembalian }} <br> dikembalikan</h2>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-12 grid-margin">
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
                                                @foreach($dataPengembalian as $peminjaman)
                                                <tr>
                                                    <td>{{ $peminjaman->user->name }}</td>
                                                    <td>{{ $peminjaman->buku->nama }}</td>
                                                    <td>
                                                        @if($peminjaman->status == 'return')
                                                        <label class="badge badge-gradient-success">Selesai</label>
                                                        @else
                                                        <label class="badge badge-gradient-warning">Dipinjam</label>
                                                        @endif
                                                    </td>
                                                    <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                                                    <td>{{ $peminjaman->tanggal_pengembalian ?? '-' }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> -->

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
                                                <p class="mb-0 font-weight-light">Jl. Raya Karadenan No.7, Karadenan, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16111</p>
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
