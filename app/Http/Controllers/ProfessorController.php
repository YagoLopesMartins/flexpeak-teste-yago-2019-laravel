<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Professor;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\ProfessorFormRequest;
use DB;


class ProfessorController extends Controller
{
    // metodos
    public function __construct(){

    }
    // concsultando algo no banco de dados
    public function index(Request $request){
        
        if($request){
            // trim = funcao para ignorar os espaços, antes e depois
            $query=trim($request->get('searchText'));
            $professores=DB::table('professor')
                ->where('NOME', 'LIKE', '%'.$query.'%')
                ->orderBy('ID_PROFESSOR', 'desc')
                ->paginate(7);

                return view('flexpeak.professor.index', [
                    "professores"=>$professores, "searchText"=>$query
                ]);
        }
    }
    public function create(){
        return view("flexpeak.professor.create");
    }
    public function store(ProfessorFormRequest $request){
        $professor = new Professor;
        $professor->NOME            = $request->get('NOME');
        $professor->DATA_NASCIMENTO = $request->get('DATA_NASCIMENTO');
        $professor->DATA_CRIACAO    = $request->get('DATA_CRIACAO');
        $professor->save();

        return Redirect::to('flexpeak/professor');
    }
    public function show($id){
        return view("flexpeak.professor.show", [
            "professor"=>Professor::findOrFail($id)
        ]);

    }
    public function edit($id){
        return view("flexpeak.professor.edit", [
            "professor"=>Professor::findOrFail($id)
        ]);
    }
    public function update(ProfessorFormRequest $request, $id){
        $professor = Professor::findOrFail($id);
        $professor->NOME            = $request->get('NOME');
        $professor->DATA_NASCIMENTO = $request->get('DATA_NASCIMENTO');
        $professor->DATA_CRIACAO    = $request->get('DATA_CRIACAO');
        $professor->update();
        return Redirect::to('flexpeak/professor');
    }
    public function destroy($id){
        $professor = Professor::findOrFail($id);
        // 0 categoria inativa (melhor por questao de bd)
        $professor->delete();
        return Redirect::to('flexpeak/professor');
    }
}
