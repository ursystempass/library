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
        return view('admin.user.create', compact('classes','majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_user' => 'required|string|max:25',
            'nis' => 'required|string|max:20|unique:users',
            'fullname' => 'required|string|max:125',
            'password' => 'required|string|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alamat' => 'required|string|max:225',
            'role' => 'nullable|string|max:50',
            'join_date' => 'required|string|max:125',
            'major_id' => 'nullable|exists:majors,id',
            'class_id' => 'nullable|exists:classes,id',
        ]);

        try {
            $user = new User();
            $user->kode_user = $request->kode_user;
            $user->nis = $request->nis;
            $user->fullname = $request->fullname;
            $user->password = Hash::make($request->password);
            $user->alamat = $request->alamat;
            $user->role = $request->role ?? 'member';
            $user->join_date = $request->join_date;
            $user->major_id = $request->major_id;
            $user->class_id = $request->class_id;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/users'), $imageName);
                $user->image = 'images/users/' . $imageName;
            }

            $user->save();

            return redirect()->route('users.index')
                ->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('users.create')
                ->with('error', 'Failed to create user. ' . $e->getMessage())
                ->withInput();
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_user' => 'required|string|max:25',
            'nis' => 'required|string|max:20|unique:users,nis,' . $id,
            'fullname' => 'required|string|max:125',
            'kelas' => 'required|string|max:50',
            'alamat' => 'required|string|max:225',
            'role' => 'string|max:50',
            'join_date' => 'required|date_format:Y-m-d',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maximum 2MB
        ]);

        $user = User::findOrFail($id);

        $user->kode_user = $request->input('kode_user');
        $user->nis = $request->input('nis');
        $user->fullname = $request->input('fullname');
        $user->kelas = $request->input('kelas');
        $user->alamat = $request->input('alamat');
        $user->role = $request->input('role');
        $user->join_date = $request->input('join_date');

        // Handle password update
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
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

        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully');
    }
}

