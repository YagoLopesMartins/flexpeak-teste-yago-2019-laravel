@extends('layouts.admin')
@section('conteudo')
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h3>Editar Aluno: {{ $aluno->NOME }}</h3>
				@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
				@endif
			</div>
		</div>

	{!!Form::model($aluno, ['method'=>'PATCH', 'route'=>['aluno.update', $aluno->ID_ALUNO]])!!}
	{{Form::token()}}
        <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="NOME">Nome</label>
                        <input type="text" name="NOME" class="form-control" 
                            required value="{{$aluno->NOME}}" placeholder="Nome...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <label for="DATA_NASCIMENTO">Data Nascimento</label>
                                    <input type="date" name="DATA_NASCIMENTO" class="form-control" 
                                        required value="{{$aluno->DATA_NASCIMENTO}}" placeholder="2019-08-10...">
                            </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <label for="CEP">Cep</label>
                                    <input type="text" name="CEP" class="form-control" id="CEP"
                                        required value="{{$aluno->CEP}}" placeholder="2019-08-10..." onblur="pesquisacep(this.value);">
                            </div>
                          
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                                <label for="LOGRADOURO">Logradouro</label>
                                <input type="text" name="LOGRADOURO" class="form-control" id="LOGRADOURO"
                                    required value="{{$aluno->LOGRADOURO}}" placeholder="2019-08-10...">
                        </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <label for="NUMERO">Número</label>
                                    <input type="text" name="NUMERO" class="form-control" 
                                        required value="{{$aluno->NUMERO}}" placeholder="2019-08-10...">
                            </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                                <label for="BAIRRO">Bairro</label>
                                <input type="text" name="BAIRRO" class="form-control" id="BAIRRO"
                                    required value="{{$aluno->BAIRRO}}" placeholder="2019-08-10...">
                        </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <label for="CIDADE">Cidade</label>
                                    <input type="text" name="CIDADE" class="form-control" id="CIDADE"
                                        required value="{{$aluno->CIDADE}}" placeholder="2019-08-10...">
                            </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                                <label for="ESTADO">Estado</label>
                                <input type="text" name="ESTADO" class="form-control" id="ESTADO"
                                    required value="{{$aluno->ESTADO}}" placeholder="2019-08-10...">
                        </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <label for="DATA_CRIACAO">Data Criação</label>
                                    <input type="date" name="DATA_CRIACAO" class="form-control" 
                                        required value="{{$aluno->DATA_CRIACAO}}" placeholder="2019-08-10...">
                            </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="from-group">
                                <label for="">Curso</label>
                                <select name="ID_CURSO" id="" class="form-control">
                                    @foreach ($cursos as $c)
                                        @if ($c->ID_CURSO == $aluno->ID_CURSO)
                                            <option value="{{$c->ID_CURSO}}" selected>
                                                {{$c->NOME}}
                                            </option>
                                        @else
                                            <option value="{{$c->ID_CURSO}}">
                                                    {{$c->NOME}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                </div>
            </div>
            <div class="row">  
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
            </div>
	{!!Form::close()!!}		
@stop