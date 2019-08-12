@extends('layouts.admin')

@section('conteudo')
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Novo Aluno</h3>
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

        {!!Form::open(array('url'=>'flexpeak/aluno','method'=>'POST','autocomplete'=>'off'))!!}
             {{Form::token()}}
             <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="NOME">Nome</label>
                        <input type="text" name="NOME" class="form-control" 
                            required value="{{old('NOME')}}" placeholder="Nome...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <label for="DATA_NASCIMENTO">Data Nascimento</label>
                                    <input type="date" name="DATA_NASCIMENTO" class="form-control" 
                                        required value="{{old('DATA_NASCIMENTO')}}" placeholder="2019-08-10...">
                            </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <label for="CEP">Cep</label>
                                    <input type="text" name="CEP" class="form-control" id="CEP"
                                        required value="{{old('CEP')}}" placeholder="2019-08-10..." onblur="pesquisacep(this.value);">
                                        
                            </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                                <label for="LOGRADOURO">Logradouro</label>
                                <input type="text" name="LOGRADOURO" class="form-control" id="LOGRADOURO"
                                    required value="{{old('LOGRADOURO')}}" placeholder="2019-08-10...">
                        </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <label for="NUMERO">Número</label>
                                    <input type="number" name="NUMERO" class="form-control" 
                                        required value="{{old('NUMERO')}}" placeholder="2019-08-10...">
                            </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                                <label for="BAIRRO">Bairro</label>
                                <input type="text" name="BAIRRO" class="form-control" id="BAIRRO"
                                    required value="{{old('BAIRRO')}}" placeholder="2019-08-10...">
                        </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <label for="CIDADE">Cidade</label>
                                    <input type="text" name="CIDADE" class="form-control" id="CIDADE"
                                        required value="{{old('CIDADE')}}" placeholder="2019-08-10...">
                            </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                                <label for="ESTADO">Estado</label>
                                <input type="text" name="ESTADO" class="form-control" id="ESTADO"
                                    required value="{{old('ESTADO')}}" placeholder="2019-08-10...">
                        </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <label for="DATA_CRIACAO">Data Criação</label>
                                    <input type="date" name="DATA_CRIACAO" class="form-control" 
                                        required value="{{old('DATA_CRIACAO')}}" placeholder="2019-08-10...">
                            </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                            <div class="from-group">
                                <label for="">Curso</label>
                                <select name="ID_CURSO" id="" class="form-control">
                                    @foreach ($cursos as $c)
                                        <option value="{{$c->ID_CURSO}}">
                                            {{$c->NOME}}
                                        </option>
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