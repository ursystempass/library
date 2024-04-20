User
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form Detail Peminjaman</h4>
                                <form action="{{ route('borrowingdetails.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="borrowing_id">Peminjaman:</label>
                                                <select name="borrowing_id" id="borrowing_id" class="form-control">
                                                    <option value="{{ $selectedBorrowing->id }}">{{ $selectedBorrowing->borrow_code }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="book_id">Buku:</label>
                                                <select name="book_id" id="book_id" class="form-control">
                                                    <!-- Tambahkan pilihan buku yang tersedia -->
                                                    @foreach($books as $book)
                                                        @if($book->status !== 'borrow')
                                                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="type">Tipe:</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="personal">Pribadi</option>
                                                    <option value="monthly">Bulanan</option>
                                                    <option value="annual">Tahunan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="book_condition">Kondisi Buku:</label>
                                                <select name="book_condition" id="book_condition" class="form-control">
                                                    <option value="good">Baik</option>
                                                    <option value="damaged">Rusak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                            <a href="{{ route('borrowings.index') }}" class="btn btn-light">Cancel</a>
                                        </div>
                                    </div>
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
