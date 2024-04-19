<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.head')
    <style>
        .profile-container {
            display: flex;
            align-items: center;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-details {
            flex-grow: 1;
        }

        .profile-details h4 {
            margin-bottom: 10px;
        }

        .profile-details p {
            margin-bottom: 5px;
        }
    </style>
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
                                <!-- Tampilan untuk pengguna -->
                                <div class="profile-container">
                                    <div class="profile-image">
                                        @if($user->role === 'member')
                                            @if($user->image)
                                                <img src="{{ asset('storage/profile/' . $user->image) }}" alt="Profile Picture">
                                            @else
                                                <p>Update fotomu</p>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="profile-details">
                                        <h4>Selamat datang, {{ $user->fullname }}!</h4>
                                        <p>Kode User: {{ $user->kode_user }}</p>
                                        <p>NIS: {{ $user->nis }}</p>
                                        <p>Email: {{ $user->email }}</p>
                                        <p>Alamat: {{ $user->alamat }}</p>
                                        <!-- Tambahkan informasi profil lainnya yang Anda inginkan -->
                                    </div>
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
