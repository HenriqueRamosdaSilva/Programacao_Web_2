<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $termo = trim((string) $request->input('busca', ''));
        $cargaMinima = $request->input('carga_minima');

        $consulta = Curso::query();

        if ($termo !== '') {
            $consulta->where('nome', 'ilike', '%' . $termo . '%');
        }

        if ($cargaMinima !== null && $cargaMinima !== '' && is_numeric($cargaMinima)) {
            $consulta->where('carga_horaria', '>=', (int) $cargaMinima);
        }

        $cursos = $consulta
            ->orderBy('nome')
            ->paginate(10)
            ->withQueryString();

        return view('cursos.index', [
            'cursos' => $cursos,
            'termo' => $termo,
            'cargaMinima' => $cargaMinima,
        ]);
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:150|unique:cursos,nome',
            'descricao' => 'required|string',
            'carga_horaria' => 'required|integer|min:1',
            'ativo' => 'required|boolean',
        ]);

        Curso::create($dados);
        return redirect()->route('cursos.index')->with('success', 'Curso cadastrado!');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:150|unique:cursos,nome,' . $curso->id,
            'descricao' => 'required|string',
            'carga_horaria' => 'required|integer|min:1',
            'ativo' => 'required|boolean',
        ]);

        $curso->update($dados);
        return redirect()->route('cursos.index')->with('success', 'Curso atualizado!');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso excluído!');
    }
}