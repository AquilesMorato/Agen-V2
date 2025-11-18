<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\User;
use App\Models\Empresa;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::with(['user', 'empresa'])->get();
        return view('agendas.index', compact('agendas'));
    }

    public function create()
    {
        $consultores = User::where('status', 'Ativo')->get();
        $empresas = Empresa::all();
        return view('agendas.create', compact('consultores', 'empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'empresa_id' => 'required|exists:empresas,id',
            'data' => 'required|date',
            'hora' => 'required',
            'assunto' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        Agenda::create($request->all());

        return redirect()->route('agendas.index');
    }

    public function edit(Agenda $agenda)
    {
        $consultores = User::where('status', 'Ativo')->get();
        $empresas = Empresa::all();
        return view('agendas.edit', compact('agenda', 'consultores', 'empresas'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'empresa_id' => 'required|exists:empresas,id',
            'data' => 'required|date',
            'hora' => 'required',
            'assunto' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        $agenda->update($request->all());

        return redirect()->route('agendas.index');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('agendas.index');
    }
}