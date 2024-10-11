<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
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
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [App\Http\Controllers\UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\UserController::class, 'register']);

Route::get('/perfil', [App\Http\Controllers\UserController::class, 'index'])->name('perfil')->middleware('auth');

Route::get('/noticias', function () {
    return view('pages.noticias');
})->name('noticias');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// tipos-usuarios
Route::resource('tipos-usuario', YTipoUsuarioController::class);

// inscritos-cursos
Route::resource('inscritos-curso', YInscritosCursoController::class);

// estados
Route::resource('estados', YEstadoController::class);

// t-juegos
Route::resource('t-juego', TJuegoController::class);

// poa
Route::resource('poa', PoaController::class);

// no-inscritos-sofiaplus
Route::resource('no-inscritos-sofiaplu', NoInscritosSofiapluController::class);

// grupos
Route::resource('grupo', GrupoController::class);

// gestion-cursos
Route::resource('gestion-curso', GestionCursoController::class);

// files-concertaciones
Route::resource('files-concertacione', FilesConcertacioneController::class);

// file
Route::resource('file', FileController::class);

// emprendimiento
Route::resource('emprendimiento', EmprendimientoController::class);

// cursos-solicitados
Route::resource('cursos-solicitados', CursosSolicitadoController::class);

// cursos-detalles
Route::resource('cursos-detalle', CursosDetalleController::class);

// cursos
Route::resource('curso', CursoController::class);

// concertaciones
Route::resource('concertacione', ConcertacioneController::class);

// competencia
Route::resource('competencia', CompetenciaController::class);

// asignar-municipio
Route::resource('asignar-municipio', AsignarMunicipioController::class);

// alianza-municipios
Route::resource('alianza-municipio', AlianzaMunicipioController::class);

// acceso-registros
Route::resource('acceso-registro', AccesoRegistroController::class);

// usuario
Route::resource('user', UserController::class);
Route::get('/usuarios/{id}/imagen', [UserController::class, 'mostrarImagen'])->name('usuarios.imagen');

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::post('/buscar-inscritos', [YInscritosCursoController::class, 'buscar'])->name('buscar.inscritos');