<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agenda;
use App\Models\Empresa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $consultoresAtivos = User::where('status', 'Ativo')->count();
        $agendasConfirmadas = Agenda::where('status', 'Confirmado')->count();
        $agendasPendentes = Agenda::where('status', 'Pendente')->count();
        $totalEmpresas = Empresa::count();

        return view('dashboard', [
            'consultoresAtivos' => $consultoresAtivos,
            'agendasConfirmadas' => $agendasConfirmadas,
            'agendasPendentes' => $agendasPendentes,
            'totalEmpresas' => $totalEmpresas,
        ]);
    }
}