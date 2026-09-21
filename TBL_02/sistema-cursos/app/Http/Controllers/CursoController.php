<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255|unique:cursos,nome',
            'descricao' => 'required|string',
            'carga_horaria' => 'required|integer|min:1',
            'ativo' => 'nullable|boolean',
        ]);

        $validated['ativo'] = $request->has('ativo');

        Curso::create($validated);

        return redirect()->route('cursos.index')->with('success', 'Curso cadastrado com sucesso!');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso excluído com sucesso!');
    }
}