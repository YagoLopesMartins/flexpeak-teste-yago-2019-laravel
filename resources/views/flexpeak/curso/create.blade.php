@extends('layouts.admin')

@section('conteudo')
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3>Novo Curso</h3>
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

        {!!Form::open(array('url'=>'flexpeak/curso','method'=>'POST','autocomplete'=>'off'))!!}
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
                    <div class="from-group">
                        <label for="">Professor</label>
                        <select name="ID_PROFESSOR" id="" class="form-control">
                            @foreach ($professores as $prof)
                                <option value="{{$prof->ID_PROFESSOR}}">
                                    {{$prof->NOME}}
                                </option>
                            @endforeach
                        </select>
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