<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('flexpeak/professor', 'ProfessorController');
Route::resource('flexpeak/curso',     'CursoController');
Route::resource('flexpeak/aluno',     'AlunoController');

Route::get('/pdf_alunos', 'AlunoController@pdf');
//Route::get('/pdf_alunos', 'AlunoController@pdf');
//Route::get('/pdf_alunos', 'AlunoController@pdf');
