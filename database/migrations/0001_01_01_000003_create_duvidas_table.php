<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('duvidas', function (Blueprint $table) {
            $table->id();
            $table->text("questao");
            $table->text("resposta");
        });

        DB::table("duvidas")->insert([
            [
                'questao' => "As provas de 2024 serão para qual etapa?",
                'resposta' => "As provas do Paes em 2024 serão para a Primeira e Segunda Etapa."
            ],
            
            [
                'questao' => "Podemos fazer as provas das três etapas de uma só vez?",
                'resposta' => "Inicialmente, não será permitido em 2024."
            ],
            
            [
                'questao' => "Qual o período das inscrições?",
                'resposta' => "--"
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duvidas');
    }
};
