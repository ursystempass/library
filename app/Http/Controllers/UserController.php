<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Major;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'member')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $classes = Classe::all();
        $majors = Major::all();
        return view('admin.user.create', compact('classes', 'majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_user' => 'required|string|max:25',
            'nis' => 'required|string|max:20|unique:users',
            'fullname' => 'required|string|max:125',
            'password' => 'required|string',
            'alamat' => 'required|string|max:225',
            'role' => 'required|string|in:admin,member', // validasi role
            'join_date' => 'required|string|max:125',
            'major_id' => 'nullable|exists:majors,id',
            'class_id' => 'nullable|exists:classes,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // tambahkan validasi untuk gambar
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/user', 'public');
            $request['image'] = $imagePath;
        }

        // Hash password dan simpan pengguna
        $request['password'] = Hash::make($request['password']);
        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $classes = Classe::all();
        $majors = Major::all();
        return view('admin.user.edit', compact('user', 'classes', 'majors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_user' => 'required|string|max:25',
            'nis' => 'required|string|max:20|unique:users,nis,' . $id,
            'fullname' => 'required|string|max:125',
            'password' => 'nullable|string|min:6', // Password is optional for update
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat' => 'required|string|max:225',
            'role' => 'nullable|string|max:50',
            'join_date' => 'required|string|max:125',
            'major_id' => 'nullable|exists:majors,id',
            'class_id' => 'nullable|exists:classes,id',
        ]);

        $user = User::findOrFail($id);

        $user->kode_user = $request->input('kode_user');
        $user->nis = $request->input('nis');
        $user->fullname = $request->input('fullname');
        $user->alamat = $request->input('alamat');
        $user->role = $request->input('role') ?? 'member';
        $user->join_date = $request->input('join_date');
        $user->major_id = $request->input('major_id');
        $user->class_id = $request->input('class_id');

        // Handle password update if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/users'), $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
