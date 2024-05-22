<?php

namespace App\Http\Controllers;

use App\Models\Duvida;
use Illuminate\View\View;

class HomeController extends Controller
{
    private array $duvidas = [];

    public function render(): View {
        foreach (Duvida::inRandomOrder()->limit(3)->get() as $duvida) {
            $this->duvidas[$duvida->questao] = $duvida->resposta;
        }

        return view('home', [
            'pageTitle' => "PAES | COTEPS | UNIMONTES",
            'duvidas' => $this->duvidas
        ]);
    }
}
