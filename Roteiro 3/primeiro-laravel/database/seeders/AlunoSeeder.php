<?php

namespace Database\Seeders;

use App\Models\Aluno;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alunos = [
            ['nome' => 'Henrique Silva', 'email' => 'henrique@email.com'],
            ['nome' => 'Ana Souza', 'email' => 'ana@email.com'],
            ['nome' => 'Carlos Eduardo', 'email' => 'carlos@email.com'],
            ['nome' => 'Beatriz Costa', 'email' => 'beatriz@email.com'],
        ];

        foreach ($alunos as $aluno) {
            Aluno::updateOrCreate(['email' => $aluno['email']], $aluno);
        }
    }
}
