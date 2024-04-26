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
                                <h4 class="card-title">Tambah Buku</h4>
                                <form id="bookForm" action="{{ route('books.store') }}" method="POST"
                                    enctype="multipart/form-data" onsubmit="submitForm()">
                                    @csrf
                                    <div class="form-group">
                                        <label for="book_code">Kode Buku:</label>
                                        <input type="text" class="form-control" id="book_code" name="book_code"
                                            value="{{ old('book_code', $bookCode) }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="no">Nomor Induk:</label>
                                        <input type="number" class="form-control" id="no" name="no"
                                            value="{{ old('no') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Judul:</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Penulis:</label>
                                        <input type="text" class="form-control" id="author" name="author"
                                            value="{{ old('author') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="publisher">Penerbit:</label>
                                        <input type="text" class="form-control" id="publisher" name="publisher"
                                            value="{{ old('publisher') }}">
                                    </div>
                                    <div class="form-group">
    <label for="publication_year">Tahun Terbit:</label>
    <input type="number" class="form-control" id="publication_year" name="publication_year" value="{{ old('publication_year', date('Y')) }}" min="1900">
</div>



                                    <div class="form-group">
                                        <label for="acquisition_date">Tanggal Perolehan:</label>
                                        <input type="date" class="form-control" id="acquisition_date"
                                            name="acquisition_date" value="{{ old('acquisition_date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="number_of_copies">Jumlah Exampler:</label>
                                        <input type="text" class="form-control" id="number_of_copies"
                                            name="number_of_copies" value="{{ old('number_of_copies') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="acquisition_source">Sumber Perolehan:</label>
                                        <input type="text" class="form-control" id="acquisition_source"
                                            name="acquisition_source" value="{{ old('acquisition_source') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="ready" {{ old('status') == 'ready' ? 'selected' : '' }}>
                                                Tersedia</option>
                                            <option value="borrow" {{ old('status') == 'borrow' ? 'selected' : '' }}>
                                                Dipinjam</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="type_id">Jenis Buku:</label>
                                        <select class="form-control" id="type_id" name="type_id">
                                            @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bookshelf_id">Rak:</label>
                                        <select class="form-control" id="bookshelf_id" name="bookshelf_id">
                                            @foreach($bookshelves as $bookshelf)
                                            <option value="{{ $bookshelf->id }}">{{ $bookshelf->shelf_location }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="file" class="form-control" id="image" name="image">
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
