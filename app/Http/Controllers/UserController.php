<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = user::paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roleOption = [
            'admin' => 'Admin',
            'petugas' => 'Petugas',
        ];

        return view('user.create', compact('roleOption'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'role' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',

        ]);

        User::create($validatedData);
        return redirect()->route('user.index')->with('success', 'Berhasil membuat user baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roleOption = [
            'admin' => 'Admin',
            'petugas' => 'Petugas',
        ];

        return view('user.edit', compact('user', 'roleOption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' .$user->id,
            'role' => 'required',
            'password' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            $validatedData['password'] = $user->password;
        }

        $user->update($validatedData);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', "Berhasil menghapus data user!");
    }
}
