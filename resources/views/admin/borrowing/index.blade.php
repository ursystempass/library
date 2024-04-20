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
                                <h4 class="card-title">Daftar Peminjam</h4>
                                <a href="{{ route('borrowings.create') }}" class="btn btn-gradient-primary">Tambah
                                    Peminjam</a>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode Peminjaman</th>
                                                <th>Buku</th>
                                                <th>Peminjam</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($borrowing as $borrow)
                                                <tr>
                                                    <td>{{ $borrow->borrow_code }}</td>
                                                    <td>
                                                        @foreach($borrow->borrowingDetails as $detail)
                                                            {{ $detail->book->title }}
                                                            <br>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $borrow->user->fullname }}</td>
                                                    <td>{{ $borrow->borrow_date }}</td>
                                                    <td>{{ $borrow->due_date }}</td>
                                                    <td>
                                                        <!-- Tambahkan tombol untuk edit dan delete -->
                                                        <a href="{{ route('borrowings.edit', $borrow->id) }}"
                                                            class="btn btn-info btn-sm">Edit</a>
                                                        <form action="{{ route('borrowings.destroy', $borrow->id) }}"
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
