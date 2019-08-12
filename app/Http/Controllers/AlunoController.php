<?php

namespace sistemaLaravel\Http\Controllers;

use Illuminate\Http\Request;
use sistemaLaravel\Aluno;
use Illuminate\Support\Facades\Redirect;
use sistemaLaravel\Http\Requests\AlunoFormRequest;
use DB;
use PDF;

class AlunoController extends Controller
{

    public function pdf(){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->converte_dados_dos_alunos_para_html());
        return $pdf->stream();
        //$pdf = \App::make('dompdf.wrapper');
        //$pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
    }
    function converte_dados_dos_alunos_para_html(){
        $alunos = DB::table('aluno as a')
        ->join('curso as c', 'a.ID_CURSO', '=', 'c.ID_CURSO')
        ->join('professor as p', 'c.ID_PROFESSOR', '=', 'p.ID_PROFESSOR')
                // pegue os campos do curso(ID, NOME,DATA_CRIACAO) da tabela professor peque o campo NOME
                ->select('a.ID_ALUNO', 'a.NOME','c.NOME as CURSO', 'p.NOME as PROFESSOR')
            ->limit(10)
            ->get();

        $saida = '
                    <h3 align="center">Relatório de Alunos Cadastrados</h3>

                    <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                        <th style="border: 1px solid; padding:12px;" width="15%">Nome</th>
                        <th style="border: 1px solid; padding:12px;" width="15%">Curso</th>
                        <th style="border: 1px solid; padding:12px;" width="15%">Professor</th>
                    </tr>
                ';  
        foreach($alunos as $aluno)
        {
            $saida .= '
                <tr>
                    <td style="border: 1px solid; padding:12px;">'.$aluno->NOME.'</td>
                    <td style="border: 1px solid; padding:12px;">'.$aluno->CURSO.'</td>
                    <td style="border: 1px solid; padding:12px;">'.$aluno->PROFESSOR.'</td>
                </tr>
            ';
        }
            $saida .= '</table>';
            return $saida;
    }
    
    // metodos
    public function __construct(){}
    // concsultando algo no banco de dados
    public function index(Request $request){
        if($request){
            // trim = funcao para ignorar os espaços, antes e depois
            $query=trim($request->get('searchText'));
            // selecione a tabela aluno do BD e apelide-a de c
            $alunos=DB::table('aluno as a')
            // junte (relacao) com a tabela curso e apelide-a de p
            ->join('curso as c', 'a.ID_CURSO', '=', 'c.ID_CURSO')
                // pegue os campos do curso(ID, NOME,DATA_CRIACAO) da tabela professor peque o campo NOME
                ->select('a.ID_ALUNO', 'a.NOME', 'a.DATA_NASCIMENTO','a.LOGRADOURO',
                        'a.NUMERO','a.BAIRRO','a.CIDADE','a.ESTADO','a.DATA_CRIACAO','a.CEP',
                        'c.NOME as CURSO')
                    // para buscar
                    ->where('a.NOME', 'LIKE', '%'.$query.'%')
                         // ordenar
                        ->orderBy('ID_ALUNO', 'desc')
                           // qtd de itens por pagina e paginacao automatica
                            ->paginate(7);

                return view('flexpeak.aluno.index', [
                    "alunos"=>$alunos, "searchText"=>$query
                ]);
        }
    }
    public function create(){
        $cursos = DB::table('curso')
        ->get();
        return view("flexpeak.aluno.create", ["cursos"=>$cursos]);
    }
    public function store(AlunoFormRequest $request){
        $aluno = new Aluno;
            $aluno->NOME            = $request->get('NOME');
            $aluno->DATA_NASCIMENTO = $request->get('DATA_NASCIMENTO');
            $aluno->LOGRADOURO      = $request->get('LOGRADOURO');
            $aluno->NUMERO          = $request->get('NUMERO');
            $aluno->BAIRRO          = $request->get('BAIRRO');
            $aluno->CIDADE          = $request->get('CIDADE');
            $aluno->ESTADO          = $request->get('ESTADO');
            $aluno->DATA_CRIACAO    = $request->get('DATA_CRIACAO');
            $aluno->CEP             = $request->get('CEP');
            $aluno->ID_CURSO        = $request->get('ID_CURSO');
        $aluno->save();

        return Redirect::to('flexpeak/aluno');
    }
    public function show($id){
        return view("flexpeak.aluno.show", [
            "aluno"=>Aluno::findOrFail($id)
        ]);

    }
    public function edit($id){

        $aluno = Aluno::findOrFail($id);
        $cursos = DB::table('curso')
            ->get();

        return view("flexpeak.aluno.edit", [
            "aluno"=>$aluno, "cursos"=>$cursos]);
    }
    public function update(AlunoFormRequest $request, $id){
        $aluno = Aluno::findOrFail($id);
            $aluno->NOME            = $request->get('NOME');
            $aluno->DATA_NASCIMENTO = $request->get('DATA_NASCIMENTO');
            $aluno->LOGRADOURO      = $request->get('LOGRADOURO');
            $aluno->NUMERO          = $request->get('NUMERO');
            $aluno->BAIRRO          = $request->get('BAIRRO');
            $aluno->CIDADE          = $request->get('CIDADE');
            $aluno->ESTADO          = $request->get('ESTADO');
            $aluno->DATA_CRIACAO    = $request->get('DATA_CRIACAO');
            $aluno->CEP             = $request->get('CEP');
            $aluno->ID_CURSO        = $request->get('ID_CURSO');
        $aluno->update();
        return Redirect::to('flexpeak/aluno');
    }
    public function destroy($id){
        $aluno = Aluno::findOrFail($id);
        // 0 categoria inativa (melhor por questao de bd)
        $aluno->delete();
        return Redirect::to('flexpeak/aluno');
    }
}
