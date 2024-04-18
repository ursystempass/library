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
                                <h4 class="card-title">Daftar Buku</h4>
                                <a href="{{ route('books.create') }}" class="btn btn-gradient-primary">Tambah Buku</a>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Buku</th>
                                                <th>Judul Buku</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Terbit</th>
                                                <th>Tanggal & Tahun Perolehan</th>
                                                <th>Jumlah Exsemplar</th>
                                                <th>Sumber Perolehan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr>
                                                    <td>{{ $book->no }}</td>
                                                    <td>{{ $book->book_code }}</td>
                                                    <td>{{ $book->judul_buku }}</td>
                                                    <td>{{ $book->pengarang }}</td>
                                                    <td>{{ $book->penerbit }}</td>
                                                    <td>{{ $book->tahun_terbit }}</td>
                                                    <td>{{ $book->tgl_thn_perolehan }}</td>
                                                    <td>{{ $book->jumlah_exsemplar }}</td>
                                                    <td>{{ $book->sumber_perolehan }}</td>
                                                    <td>
                                                        <a href="{{ route('books.edit', $book->id) }}"
                                                            class="btn btn-info btn-sm">Edit</a>
                                                        <form action="{{ route('books.destroy', $book->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Delete</button>
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
