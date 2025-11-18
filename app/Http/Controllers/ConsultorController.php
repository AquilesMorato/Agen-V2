<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ConsultorController extends Controller
{
    public function index()
    {
        $consultores = User::all();
        return view('consultores.index', ['consultores' => $consultores]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'telefone' => ['nullable', 'string', 'max:20'],
            'status' => ['required', 'string'],
            'role' => ['required', 'string'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefone' => $request->telefone,
            'status' => $request->status,
            'role' => $request->role,
        ]);

        return redirect()->route('consultores.index');
    }

    public function edit(User $consultore)
    {
        return view('consultores.edit', ['consultor' => $consultore]);
    }

    public function update(Request $request, User $consultore)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class. ',email,' . $consultore->id],
            'telefone' => ['nullable', 'string', 'max:20'],
            'status' => ['required', 'string'],
            'role' => ['required', 'string'],
        ]);

        $consultore->update([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'status' => $request->status,
            'role' => $request->role,
        ]);

        return redirect()->route('consultores.index');
    }

    public function destroy(User $consultore)
    {
        $consultore->delete();
        return redirect()->route('consultores.index');
    }
}