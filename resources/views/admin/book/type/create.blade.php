i<!DOCTYPE html>
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
                                <form action="{{ route('types.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Jenis Peminjaman</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                    </div>
                                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                                    <a href="{{ route('types.index') }}" class="btn btn-light">Cancel</a>
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

