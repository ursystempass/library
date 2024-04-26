<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile-member.css') }}">
</head>
<body>
    <div class="container">
        <div class="profile-box">
            <div class="profile-header">
                <h2>User Profile</h2>
            </div>
            <div class="profile-body">
                {{-- <div class="profile-picture" id="profile-picture">
                    <img src="{{ asset('images/user/' . $user->image) }}" alt="Profile Picture">
                </div> --}}

                <div class="profile-info">
                    <div class="info-row">
                        <p>NIS:</p>
                        <p>{{ $user->nis }}</p>
                    </div>
                    <div class="info-row">
                        <p>Nama:</p>
                        <p>{{ $user->fullname }}</p>
                    </div>
                    <div class="info-row">
                        <p>Alamat:</p>
                        <p>{{ $user->alamat }}</p>
                    </div>
                    <div class="info-row">
                        <p>Jurusan:</p>
                        <p>{{ $user->major?->nama ?? '' }}</p>
                    </div>
                    <div class="info-row">
                        <p>Kelas:</p>
                        <p>{{ $user->class?->nama ?? '' }}</p>
                    </div>
                    {{-- <button class="logout-btn">Logout</button> --}}
                </div>
            </div>

        </div>
    </div>
</body>
</html>
