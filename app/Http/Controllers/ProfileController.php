<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User; // Import model User

class ProfileController extends Controller
{

    public function show()
    {
        // Mendapatkan profil pengguna yang sedang login
        $user = auth()->user();

        // Mengirimkan data user ke view profile
        return view('admin.profile', compact('user'));
    }
    public function showMember()
    {
        // Mendapatkan profil pengguna yang sedang login
        $user = auth()->user();

        // Mengambil semua majors dan classes dari database
        $majors = Major::all();
        $classes = Classe::all();

        // Mengirimkan data user, majors, dan classes ke view profile-member
        return view('member.profile-member', compact('user', 'majors', 'classes'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('edit_profile', compact('user'));
    }

    public function update(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'kode_user' => 'required|string|max:25',
            'nis' => 'required|string|max:20|unique:users,nis,' . auth()->id(),
            'fullname' => 'required|string|max:125',
            'password' => 'required|string', // Anda mungkin ingin menambahkan validasi tambahan untuk password
            'image' => 'nullable|image|max:2048', // Anda mungkin ingin menambahkan validasi tambahan untuk gambar
            'alamat' => 'required|string|max:225',
        ]);

        // Perbarui data profil pengguna yang sedang login
        $user = auth()->user();
        $user->kode_user = $request->kode_user;
        $user->nis = $request->nis;
        $user->fullname = $request->fullname;
        $user->password = bcrypt($request->password);
        $user->alamat = $request->alamat;

        // Jika ada file gambar yang diunggah, simpan ke storage dan perbarui nama file di database
        if ($request->hasFile('image')) {
            // Hapus foto profil lama jika ada
            if ($user->image) {
                Storage::delete('public/profile/' . $user->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/profile', $image, $imageName);
            $user->image = $imageName;
        }

        // Simpan perubahan


        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }
}
