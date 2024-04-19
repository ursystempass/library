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
                                <h4 class="card-title">Add Book</h4>
                                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="no">No:</label>
                                        <input type="text" class="form-control" id="no" name="no" value="{{ old('no') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="book_code">Book Code:</label>
                                        <input type="text" class="form-control" id="book_code" name="book_code" value="{{ old('book_code', $bookCode) }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Book Title:</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Author:</label>
                                        <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="publisher">Publisher:</label>
                                        <input type="text" class="form-control" id="publisher" name="publisher" value="{{ old('publisher') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="publication_year">Publication Year:</label>
                                        <input type="text" class="form-control" id="publication_year" name="publication_year" value="{{ old('publication_year') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="acquisition_date">Acquisition Date:</label>
                                        <input type="date" class="form-control" id="acquisition_date" name="acquisition_date" value="{{ old('acquisition_date') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="number_of_copies">Number of Copies:</label>
                                        <input type="text" class="form-control" id="number_of_copies" name="number_of_copies" value="{{ old('number_of_copies') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="acquisition_source">Acquisition Source:</label>
                                        <input type="text" class="form-control" id="acquisition_source" name="acquisition_source" value="{{ old('acquisition_source') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="type_id">Type ID:</label>
                                        <select class="form-control" id="type_id" name="type_id">
                                            @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bookshelf_id">Bookshelf ID:</label>
                                        <select class="form-control" id="bookshelf_id" name="bookshelf_id">
                                            @foreach($bookshelves as $bookshelf)
                                            <option value="{{ $bookshelf->id }}">{{ $bookshelf->shelf_location }}</option>
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
