<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile-member.css') }}">
    <style>
        .profile-info {
            display: flex;
            flex-direction: column;
        }

        .profile-info p {
            margin: 5px 0;
        }

        .profile-info p:nth-child(odd) {
            width: 100px; /* Sesuaikan lebar kolom */
            font-weight: bold;
        }

        .profile-info p:nth-child(even) {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-box">
            <div class="profile-header">
                <h2>User Profile</h2>
            </div>
            <div class="profile-body">
                <div class="profile-picture">
                    <img src="{{ asset($user->image) }}" alt="Profile Picture">
                </div>
                <div class="profile-info">
                    <p>NIS:</p>
                    <p>{{ $user->nis }}</p>
                    <p>Alamat:</p>
                    <p>{{ $user->alamat }}</p>
                    <!-- Menampilkan major -->
                    <p>Major:</p>
                    <p>{{ $user->major->nama }}</p> <!-- Assumed field "nama" in the majors table -->
                    <!-- Menampilkan class -->
                    <p>Class:</p>
                    <p>{{ $user->class->nama }}</p> <!-- Assumed field "nama" in the classes table -->
                    <button class="logout-btn">Logout</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
