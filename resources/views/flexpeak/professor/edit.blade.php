@extends('layouts.admin')
@section('conteudo')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Professor: {{ $professor->NOME }}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($professor, ['method'=>'PATCH', 'route'=>['professor.update', $professor->ID_PROFESSOR]])!!}
			{{Form::token()}}

            <div class="form-group">
            	<label for="NOME">Nome</label>
            	<input type="text" name="NOME" class="form-control" 
            	value="{{ $professor->NOME }}"
            	placeholder="Nome...">
            </div>
            <div class="form-group">
            	<label for="DATA_NASCIMENTO">Data Nascimento</label>
            	<input type="text" name="DATA_NASCIMENTO" class="form-control"
            	value="{{ $professor->DATA_NASCIMENTO }}"
            	 placeholder="Data Nascimento...">
			</div>
			<div class="form-group">
            	<label for="DATA_CRIACAO">Data Criação</label>
            	<input type="text" name="DATA_CRIACAO" class="form-control"
            	value="{{ $professor->DATA_CRIACAO }}"
            	 placeholder="26/02/1994...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Salvar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@stop