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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

////////////////Administración////////////////////
//Usuarios
Route::resource('users', 'UserController');
//Periodos Académicos
Route::resource('periods', 'PeriodController');
//Lineas de Investigación
Route::resource('research_lines', 'ResearchLineController');
//Materias
Route::resource('subjects', 'SubjectController');
//Secciones
Route::resource('sections', 'SectionController');

/////////Estudiante/////////////////////////////
Route::resource('proposals', 'ProposalController');
Route::resource('specifics', 'SpecificController');
Route::resource('evaluations', 'EvaluationController');

/////////Direccion Académica//////////////////////
Route::resource('evaluators', 'EvaluatorController');
Route::resource('evaluations', 'EvaluationController');

//AJAX
Route::post('/ajaxRequest', 'UserController@ajaxRequest');
Route::post('/ajaxContenido', 'ProposalController@ajaxContenido');
Route::post('/ajaxSelProfSem', 'ProposalController@ajaxSelProfSem');
Route::post('/ajaxStudents', 'EvaluationController@ajaxStudents');
Route::post('/ajaxProposal', 'EvaluationController@ajaxProposal');

//Reportes
Route::get('/userReport', 'ReportController@usuarios');
Route::post('/userPdf', 'ReportController@usuariosPdf');

Route::get('/proposalReport', 'ReportController@proposals');
Route::post('/proposalPdf', 'ReportController@proposalsPdf');

Route::get('/assignReport', 'ReportController@assigns');
Route::post('/assignPdf', 'ReportController@assignsPdf');

//Estadistica
Route::get('/proposalXStatus', 'ChartController@proposalXStatus');





