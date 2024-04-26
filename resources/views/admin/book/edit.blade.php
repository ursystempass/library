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
                                <form id="bookForm" action="{{ route('books.update', $book->id) }}" method="POST"
                                    enctype="multipart/form-data" onsubmit="submitForm()">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="book_code">Kode Buku:</label>
                                        <input type="text" class="form-control" id="book_code" name="book_code"
                                            value="{{ old('book_code', $book->book_code) }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="no">Nomor Induk:</label>
                                        <input type="number" class="form-control" id="no" name="no"
                                            value="{{ old('no', $book->no) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Judul:</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title', $book->title) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Penulis:</label>
                                        <input type="text" class="form-control" id="author" name="author"
                                            value="{{ old('author', $book->author) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="publisher">Penerbit:</label>
                                        <input type="text" class="form-control" id="publisher" name="publisher"
                                            value="{{ old('publisher', $book->publisher) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="publication_year">Tahun Terbit:</label>
                                        <input type="number" class="form-control" id="publication_year"
                                            name="publication_year" value="{{ old('publication_year', $book->publication_year) }}" min="1900">
                                    </div>
                                    <div class="form-group">
                                        <label for="acquisition_date">Tanggal Perolehan:</label>
                                        <input type="date" class="form-control" id="acquisition_date"
                                            name="acquisition_date" value="{{ old('acquisition_date', $book->acquisition_date) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="number_of_copies">Jumlah Examplar:</label>
                                        <input type="text" class="form-control" id="number_of_copies"
                                            name="number_of_copies" value="{{ old('number_of_copies', $book->number_of_copies) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="acquisition_source">Sumber Perolehan:</label>
                                        <input type="text" class="form-control" id="acquisition_source"
                                            name="acquisition_source" value="{{ old('acquisition_source', $book->acquisition_source) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="ready" {{ old('status', $book->status) == 'ready' ? 'selected' : '' }}>
                                                Tersedia</option>
                                            <option value="borrow" {{ old('status', $book->status) == 'borrow' ? 'selected' : '' }}>
                                                Dipinjam</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="type_id">Jenis Buku:</label>
                                        <select class="form-control" id="type_id" name="type_id">
                                            @foreach($types as $type)
                                            <option value="{{ $type->id }}" {{ old('type_id', $book->type_id) == $type->id ? 'selected' : '' }}>
                                                {{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bookshelf_id">Rak:</label>
                                        <select class="form-control" id="bookshelf_id" name="bookshelf_id">
                                            @foreach($bookshelves as $bookshelf)
                                            <option value="{{ $bookshelf->id }}" {{ old('bookshelf_id', $book->bookshelf_id) == $bookshelf->id ? 'selected' : '' }}>
                                                {{ $bookshelf->shelf_location }}</option>
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
