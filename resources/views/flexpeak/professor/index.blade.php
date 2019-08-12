@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Professores <a href="professor/create"><button class="btn btn-success">Novo</button></a></h3>
			@include('flexpeak.professor.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nome</th>
						<th>Data Nascimento</th>
						<th>Data Criação</th>
						<th>Opções</th>
					</thead>
				@foreach ($professores as $prof)
					<tr>
						<td>{{ $prof->ID_PROFESSOR}}</td>
						<td>{{ $prof->NOME}}</td>
						<td>{{ $prof->DATA_NASCIMENTO}}</td>
						<td>{{ $prof->DATA_CRIACAO}}</td>
						<td>
							<a href="{{URL::action('ProfessorController@edit',$prof->ID_PROFESSOR)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$prof->ID_PROFESSOR}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
						</td>
					</tr>
					@include('flexpeak.professor.modal')
					@endforeach
				</table>
			</div>
			{{$professores->render()}}
		</div>
	</div>
@stop