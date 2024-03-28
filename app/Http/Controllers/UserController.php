<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'member')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_user' => 'required|string|max:25',
            'nis' => 'required|string|max:20|unique:users,nis',
            'fullname' => 'required|string|max:125',
            'password' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'alamat' => 'required|string|max:225',
            'role' => 'string|max:50',
            'join_date' => 'required|date_format:Y-m-d',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maximum 2MB
        ]);

        // Initialize $requestData
        $requestData = $request->all();

        // Save image if present
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/users'), $imageName);
            $requestData['image'] = $imageName;
        }

        User::create($requestData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully');
    }
}

