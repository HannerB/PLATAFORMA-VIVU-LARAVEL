<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\YTipoUsuarioController;
use App\Http\Controllers\YInscritosCursoController;
use App\Http\Controllers\YEstadoController;
use App\Http\Controllers\TJuegoController;
use App\Http\Controllers\PoaController;
use App\Http\Controllers\NoInscritosSofiapluController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\GestionCursoController;
use App\Http\Controllers\FilesConcertacioneController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\EmprendimientoController;
use App\Http\Controllers\CursosSolicitadoController;
use App\Http\Controllers\CursosDetalleController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ConcertacioneController;
use App\Http\Controllers\CompetenciaController;
use App\Http\Controllers\AsignarMunicipioController;
use App\Http\Controllers\AlianzaMunicipioController;
use App\Http\Controllers\AccesoRegistroController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('tipos-usuario', YTipoUsuarioController::class);

Route::resource('inscritos-curso', YInscritosCursoController::class);

Route::resource('estados', YEstadoController::class);

Route::resource('t-juego', TJuegoController::class);

Route::resource('poa', PoaController::class);

Route::resource('no-inscritos-sofiaplu', NoInscritosSofiapluController::class);

Route::resource('grupo', GrupoController::class);

Route::resource('gestion-curso', GestionCursoController::class);

Route::resource('files-concertacione', FilesConcertacioneController::class);

Route::resource('file', FileController::class);

Route::resource('emprendimiento', EmprendimientoController::class);

Route::resource('cursos-solicitados', CursosSolicitadoController::class);

Route::resource('cursos-detalle', CursosDetalleController::class);

Route::resource('curso', CursoController::class);

Route::resource('concertacione', ConcertacioneController::class);

Route::resource('competencia', CompetenciaController::class);

Route::resource('asignar-municipio', AsignarMunicipioController::class);

Route::resource('alianza-municipio', AlianzaMunicipioController::class);

Route::resource('acceso-registro', AccesoRegistroController::class);