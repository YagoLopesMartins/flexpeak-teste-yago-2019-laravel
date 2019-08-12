@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Cursos <a href="aluno/create"><button class="btn btn-success">Novo</button></a></h3>
			
			@include('flexpeak.aluno.search')
		</div>
	</div>
	<div class="col-md-5">
			<a href="{{ url('/pdf_alunos') }}" class="btn btn-danger">Relatório em PDF de Alunos</a>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nome</th>
						<th>Data Nascimento</th>
						<th>Logradouro</th>
						<th>Numero</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>Estado</th>
						<th>Data Criação</th>
						<th>Cep</th>
						<th>Curso</th>
						<th>Opções</th>
					</thead>
				@foreach ($alunos as $a)
					<tr>
						<td>{{ $a->ID_ALUNO}}</td>
						<td>{{ $a->NOME}}</td>
						<td>{{ $a->DATA_NASCIMENTO}}</td>
						<td>{{ $a->LOGRADOURO}}</td>
						<td>{{ $a->NUMERO}}</td>
						<td>{{ $a->BAIRRO}}</td>
						<td>{{ $a->CIDADE}}</td>
						<td>{{ $a->ESTADO}}</td>
						<td>{{ $a->DATA_CRIACAO}}</td>
						<td>{{ $a->CEP}}</td>
						<td>{{ $a->CURSO}}</td>
						<td>
							<a href="{{URL::action('AlunoController@edit',$a->ID_ALUNO)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$a->ID_ALUNO}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
						</td>
					</tr>
					@include('flexpeak.aluno.modal')
					@endforeach
				</table>
			</div>
			{{$alunos->render()}}
		</div>
	</div>
@stop