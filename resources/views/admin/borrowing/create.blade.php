<!-- resources/views/admin/borrowing/create.blade.php -->

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
                                <h4 class="card-title">Form Peminjaman</h4>
                                <form action="{{ route('borrowings.store') }}" method="post">
                                    @csrf
                                    <p class="card-description">Informasi Peminjaman</p>
                                    <div class="row">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Kode Peminjaman</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="borrow_code"
                                                    value="{{ $borrowCode }}" readonly required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_id">Select a Book:</label>
                                            <select name="book_id" id="book_id" class="form-control">
                                                @foreach ($books as $book)
                                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">User</label>
                                                <div class="col-sm-9">
                                                    <select name="user_id" class="form-control">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->fullname }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input hidden untuk borrow_date -->
                                    <input type="hidden" name="borrow_date" value="{{ $borrowDate }}" />

                                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
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
