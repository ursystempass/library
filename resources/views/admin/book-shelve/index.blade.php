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
                                <h4 class="card-title">Daftar Pengguna</h4>
                                <!-- <button type="button" class="btn btn-gradient-primary btn-sm">Tambah Pengguna</button> -->
                                <a href="{{ route('bookshelves.create') }}" class="btn btn-gradient-primary">Tambah
                                    Pengguna</a>
                                <div class="table-responsive"> <!-- Tambahkan kelas table-responsive di sini -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Lokasi Rak</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bookshelves as $bookshel)
                                                <tr>
                                                    <td>{{ $bookshel->shelf_number }}</td>
                                                    <td>{{ $bookshel->shelf_location }}</td>
                                                    <td>
                                                        <!-- Tambahkan tombol untuk edit dan delete -->
                                                        <a href="{{ route('bookshelves.edit', $bookshel->id) }}"
                                                            class="btn btn-info btn-sm">Edit</a>
                                                        <form action="{{ route('bookshelves.destroy', $bookshel->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</button>
                                                        </form>
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
