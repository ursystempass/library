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
                                                <th>Gambar</th>
                                                <th>Kode Buku</th>
                                                <th>Nomor Induk</th>
                                                <th>Judul Buku</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>Tahun Terbit</th>
                                                <th>Tanggal & Tahun Perolehan</th>
                                                <th>Jumlah Exsemplar</th>
                                                <th>Sumber Perolehan</th>
                                                <th>Series</th>
                                                <th>Status Ketersediaan</th>
                                                <th>Rak Buku</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td><img src="{{ asset($book->image) }}" alt="Gambar Buku" style="max-width: 100px; max-height: 100px;"></td>
                                                    <td>{{ $book->book_code }}</td>
                                                    <td>{{ $book->no }}</td>
                                                    <td>{{ $book->title }}</td>
                                                    <td>{{ $book->author }}</td>
                                                    <td>{{ $book->publisher }}</td>
                                                    <td>{{ $book->publication_year }}</td>
                                                    <td>{{ $book->acquisition_date }}</td>
                                                    <td>{{ $book->number_of_copies }}</td>
                                                    <td>{{ $book->acquisition_source }}</td>
                                                    <td>{{ $book->type->name }}</td>
                                                    <td>{{ $book->status }}</td>
                                                    <td>{{ $book->bookshelf->shelf_location }}</td>
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
