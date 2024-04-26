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
                                <h4 class="card-title">Form Pengembalian</h4>
                                <!-- resources/views/admin/re-back/create.blade.php -->

                                <form action="{{ route('rebacks.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="borrowing_id">Kode Peminjaman</label>
                                        <select name="borrowing_id" id="borrowing_id" class="form-control">
                                            @foreach ($borrowings as $borrowing)
                                                <option value="{{ $borrowing->id }}">{{ $borrowing->borrow_code }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="return_date">Tanggal Pengembalian</label>
                                        <input type="date" name="return_date" id="return_date" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
