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
                                <h4 class="card-title">Edit Peminjaman</h4>
                                <form action="{{ route('borrowings.update', $borrowing->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <p class="card-description">Informasi Peminjaman</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">User</label>
                                                <div class="col-sm-9">
                                                    <select name="user_id" class="form-control">
                                                        @foreach($users as $user)
                                                        <option value="{{ $user->id }}" {{ $borrowing->user_id == $user->id ? 'selected' : '' }}>{{ $user->kode_user }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Book</label>
                                                <div class="col-sm-9">
                                                    <select name="book_id" class="form-control">
                                                        @foreach($books as $book)
                                                        <option value="{{ $book->id }}" {{ $borrowing->book_id == $book->id ? 'selected' : '' }}>{{ $book->book_code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Borrow Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" name="borrow_date" value="{{ $borrowing->borrow_date }}" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Book Condition</label>
                                                <div class="col-sm-9">
                                                    <select name="book_condition" class="form-control" required>
                                                        <option value="good" {{ $borrowing->book_condition == 'good' ? 'selected' : '' }}>Good</option>
                                                        <option value="damaged" {{ $borrowing->book_condition == 'damaged' ? 'selected' : '' }}>Damaged</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                                    <a href="{{ route('borrowings.index') }}" class="btn btn-light">Cancel</a>
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
