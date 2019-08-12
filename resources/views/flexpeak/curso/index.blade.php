@extends('layouts.admin')

@section('conteudo')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Lista de Cursos <a href="curso/create"><button class="btn btn-success">Novo</button></a></h3>
			@include('flexpeak.curso.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nome</th>
						<th>Data Criação</th>
						<th>Professor</th>
						<th>Opções</th>
					</thead>
				@foreach ($cursos as $c)
					<tr>
						<td>{{ $c->ID_CURSO}}</td>
						<td>{{ $c->NOME}}</td>
						<td>{{ $c->DATA_CRIACAO}}</td>
						<td>{{ $c->PROFESSOR}}</td>
						<td>
							<a href="{{URL::action('CursoController@edit',$c->ID_CURSO)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$c->ID_CURSO}}" data-toggle="modal"><button class="btn btn-danger">Excluir</button></a>
						</td>
					</tr>
					@include('flexpeak.curso.modal')
					@endforeach
				</table>
			</div>
			{{$cursos->render()}}
		</div>
	</div>
@stop