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

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Pengembalian</h4>
                                <!-- Tambahkan tombol untuk tambah data -->
                                <a href="{{ route('rebacks.create') }}" class="btn btn-gradient-primary">Tambah Pengembalian</a>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Peminjaman</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($returnBacks as $returnBack)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $returnBack->borrowing_id }}</td>
                                                    <td>{{ $returnBack->return_date }}</td>
                                                    <td>
                                                        <a href="{{ route('redets.create', $returnBack->id) }}" class="btn btn-primary">Tambah Detail</a>
                                                        <form action="{{ route('rebacks.destroy', $returnBack->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengembalian ini?')">Hapus</button>
                                                        </form>
                                                        <!-- Jika Anda membutuhkan tombol untuk edit atau hapus, Anda bisa tambahkan di sini -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
