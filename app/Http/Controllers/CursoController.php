<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Curso;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\CursoFormRequest;
use DB;

class CursoController extends Controller
{
    // metodos
    public function __construct(){

    }
    // concsultando algo no banco de dados
    public function index(Request $request){
        
        if($request){
            // trim = funcao para ignorar os espaços, antes e depois
            $query=trim($request->get('searchText'));
            // selecione a tabela curso do BD e apelide-a de c
            $cursos=DB::table('curso as c')
            // junte (relacao) com a tabela professor e apelide-a de p
            ->join('professor as p', 'c.ID_PROFESSOR', '=', 'p.ID_PROFESSOR')
                // pegue os campos do curso(ID, NOME,DATA_CRIACAO) da tabela professor peque o campo NOME
                ->select('c.ID_CURSO', 'c.NOME', 'c.DATA_CRIACAO','p.NOME as PROFESSOR')
                    // para buscar
                    ->where('c.NOME', 'LIKE', '%'.$query.'%')
                         // ordenar
                        ->orderBy('ID_CURSO', 'desc')
                           // qtd de itens por pagina e paginacao automatica
                            ->paginate(7);

                return view('flexpeak.curso.index', [
                    "cursos"=>$cursos, "searchText"=>$query
                ]);
        }
    }
    public function create(){
        $professores = DB::table('professor')
        ->get();
        return view("flexpeak.curso.create", ["professores"=>$professores]);
    }

    public function store(CursoFormRequest $request){
        $curso = new Curso;
        $curso->NOME            = $request->get('NOME');
        $curso->DATA_CRIACAO    = $request->get('DATA_CRIACAO');
        $curso->ID_PROFESSOR    = $request->get('ID_PROFESSOR');
        $curso->save();

        return Redirect::to('flexpeak/curso');
    }
    public function show($id){
        return view("flexpeak.curso.show", [
            "curso"=>Curso::findOrFail($id)
        ]);

    }
    public function edit($id){

        $curso = Curso::findOrFail($id);
        $professores = DB::table('professor')
            ->get();

        return view("flexpeak.curso.edit", [
            "curso"=>$curso, "professores"=>$professores]);
    }
    public function update(CursoFormRequest $request, $id){
        $curso = Curso::findOrFail($id);
            $curso->NOME            = $request->get('NOME');
            $curso->DATA_CRIACAO    = $request->get('DATA_CRIACAO');
            $curso->ID_PROFESSOR    = $request->get('ID_PROFESSOR');
        $curso->update();
        return Redirect::to('flexpeak/curso');
    }
    public function destroy($id){
        $curso = Curso::findOrFail($id);
        // 0 categoria inativa (melhor por questao de bd)
        $curso->delete();
        return Redirect::to('flexpeak/curso');
    }
}
