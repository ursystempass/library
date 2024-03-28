<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first(); // Mengambil satu instance setting saja
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        // Validasi form
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desc' => 'required|string',
            'phone' => 'required|integer',
            'address' => 'required|string',
            'email' => 'required|email',
        ]);

        // Dapatkan setting yang akan diupdate
        $setting = Setting::findOrFail($request->id);

        // Jika ada file gambar yang diunggah, simpan gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($setting->image) {
                Storage::delete($setting->image);
            }

            // Simpan gambar baru dan dapatkan pathnya
            $imagePath = $request->file('image')->store('images/setting', 'public');
        } else {
            // Jika tidak ada file gambar baru diunggah, gunakan gambar yang sudah ada
            $imagePath = $setting->image;
        }

        // Update data setting
        $setting->update([
            'name' => $request->name,
            'image' => $imagePath,
            'desc' => $request->desc,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        return redirect()->route('settings.index')
            ->with('success', 'Setting updated successfully');
    }

}
