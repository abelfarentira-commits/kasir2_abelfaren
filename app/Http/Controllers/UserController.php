<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display users
        $users = User::query()->paginate(10); // Adjust pagination as needed
        return view('users.index', compact('users'));
    }
    public function create()
    {
        // Logic to show the form for creating a new user
        return view('users.create');
    }
    public function store(Request $request)
    {
        // Logic to store a new user
        $request->validate([
            'nip' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'mata_pelajaran' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function edit($id)
    {
        // Logic to show the form for editing an existing user
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Logic to update an existing user
        $request->validate([
            'nip' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'mata_pelajaran' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    public function destroy($id)
    {
        // Logic to delete a user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
