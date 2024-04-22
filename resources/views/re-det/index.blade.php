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
                                <h4 class="card-title">Daftar Pengembalian</h4>
                                <a href="{{ route('redets.create') }}" class="btn btn-gradient-primary">Tambah Pengembalian</a>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Reback Code</th>
                                                <th>Borrow code</th>
                                                <th>Fine</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($returnDetails as $returnDetail)
                                                <tr>
                                                    <td>{{ $returnDetail->return_back_id }}</td>
                                                    <td>{{ $returnDetail->borrow_id }}</td>
                                                    <td>{{ $returnDetail->fine }}</td>
                                                    <td>
                                                        <a href="{{ route('redets.create', ['returnback_id' => $returnDetail->return_back_id]) }}"
                                                            class="btn btn-success btn-sm">Action Pengembalian</a>
                                                        <a href="{{ route('redets.edit', $returnDetail->id) }}"
                                                            class="btn btn-info btn-sm">Edit</a>
                                                        <form action="{{ route('redets.destroy', $returnDetail->id) }}"
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
