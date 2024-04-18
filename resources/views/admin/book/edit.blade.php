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
                                <h4 class="card-title">Edit Buku</h4>
                                <form action="{{ route('books.update', $book->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="no">No:</label>
                                        <input type="text" class="form-control" id="no" name="no" value="{{ $book->no }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="book_code">Kode Buku:</label>
                                        <input type="text" class="form-control" id="book_code" name="book_code"
                                            value="{{ $book->book_code }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul_buku">Judul Buku:</label>
                                        <input type="text" class="form-control" id="judul_buku" name="judul_buku"
                                            value="{{ $book->judul_buku }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="pengarang">Pengarang:</label>
                                        <input type="text" class="form-control" id="pengarang" name="pengarang"
                                            value="{{ $book->pengarang }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="penerbit">Penerbit:</label>
                                        <input type="text" class="form-control" id="penerbit" name="penerbit"
                                            value="{{ $book->penerbit }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun_terbit">Tahun Terbit:</label>
                                        <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit"
                                            value="{{ $book->tahun_terbit }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_thn_perolehan">Tanggal & Tahun Perolehan:</label>
                                        <input type="date" class="form-control" id="tgl_thn_perolehan"
                                            name="tgl_thn_perolehan" value="{{ $book->tgl_thn_perolehan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_exsemplar">Jumlah Exsemplar:</label>
                                        <input type="text" class="form-control" id="jumlah_exsemplar"
                                            name="jumlah_exsemplar" value="{{ $book->jumlah_exsemplar }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sumber_perolehan">Sumber Perolehan:</label>
                                        <input type="text" class="form-control" id="sumber_perolehan"
                                            name="sumber_perolehan" value="{{ $book->sumber_perolehan }}">
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                                    <a href="{{ route('books.index') }}" class="btn btn-light">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
