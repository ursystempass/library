<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="kode_user" placeholder="Kode User" required>
        <input type="text" name="nis" placeholder="NIS" required>
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="file" name="image" accept="image/*">
        <input type="text" name="alamat" placeholder="Alamat" required>

        <!-- Dropdown for selecting role -->
        <select name="role">
            <option value="member">Member</option>
            <option value="admin">Admin</option>
        </select>

        <input type="text" name="join_date" placeholder="Join Date" required>

        <!-- Dropdown for selecting major -->
        <select name="major_id">
            <option value="">Select Major</option>
            @foreach($majors as $major)
                <option value="{{ $major->id }}">{{ $major->nama }}</option>
            @endforeach
        </select>

        <!-- Dropdown for selecting class -->
        <select name="class_id">
            <option value="">Select Class</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->nama }}</option>
            @endforeach
        </select>

        <button type="submit">Create</button>
    </form>
</body>
</html>
