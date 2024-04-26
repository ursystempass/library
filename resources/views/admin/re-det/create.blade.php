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

                                    <form action="{{ route('redets.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="returnback_id">Kode Pengembalian</label>
                                            <select name="returnback_id" id="returnback_id" class="form-control">
                                                @foreach ($returnbacks as $returnback)
                                                    <option value="{{ $returnback->id }}">{{ $returnback->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_id">Buku</label>
                                            <select name="book_id" id="book_id" class="form-control">
                                                @foreach ($books as $book)
                                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fine">Denda</label>
                                            <input type="text" name="fine" id="fine" class="form-control">
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
