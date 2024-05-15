<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    private array $duvidas = [
        'As provas de 2024 serão para qual etapa?' => "As provas do Paes em 2024 serão para a Primeira e Segunda Etapa.",
        'Podemos fazer as provas das três etapas de uma só vez?' => "Inicialmente, não será permitido em 2024.",
        'Qual o período das inscrições?' => "--"
    ];

    public function render(): View {
        return view('home', [
            'pageTitle' => "PAES | COTEPS | UNIMONTES",
            'duvidas' => $this->duvidas
        ]);
    }
}
