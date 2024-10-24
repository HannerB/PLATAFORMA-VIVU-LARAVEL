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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlaneacionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CertificacionController;

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [UserController::class, 'index'])->name('perfil');
    
    // Route::get('/tablero', [AdminController::class, 'tablero'])->name('tablero')->middleware('role:Administrador');
    // Route::get('/planeacion', [PlaneacionController::class, 'index'])->name('planeacion')->middleware('role:Administrador,Orientador');
    Route::get('/cursos-ofertados', [CursoController::class, 'ofertados'])->name('cursos.ofertados');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('role:Administrador');
    Route::get('/poa', [PoaController::class, 'index'])->name('poa')->middleware('role:Orientador');
    Route::get('/poa2', [PoaController::class, 'otrosPoaAsignados'])->name('poa2')->middleware('role:Orientador,Aprendiz');
    Route::get('/emprendimiento/consultar', [EmprendimientoController::class, 'consultar'])->name('emprendimiento.consultar')->middleware('role:Gestor');
    // Route::get('/certificaciones/consultar', [CertificacionController::class, 'consultar'])->name('certificaciones.consultar')->middleware('role:Certificación');
});

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/noticias', function () {
    return view('pages.noticias');
})->name('noticias');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/welcome', function () {
    return view('auth.welcome');
})->name('welcome')->middleware('auth');

// Recursos
Route::resource('tipos-usuario', YTipoUsuarioController::class);
Route::resource('inscritos-curso', YInscritosCursoController::class);
Route::resource('estados', YEstadoController::class);
Route::resource('t-juego', TJuegoController::class);
Route::resource('poa', PoaController::class);
Route::resource('no-inscritos-sofiaplu', NoInscritosSofiapluController::class);
Route::resource('grupo', GrupoController::class);
Route::resource('gestion-curso', GestionCursoController::class);
Route::put('/gestion-cursos2/{id}', [GestionCursoController::class, 'update'])->name('gestion-cursos2.update');

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
Route::resource('user', UserController::class);

Route::get('/usuarios/{id}/imagen', [UserController::class, 'mostrarImagen'])->name('usuarios.imagen');
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::post('/buscar-inscritos', [YInscritosCursoController::class, 'buscar'])->name('buscar.inscritos');

Route::get('/poa2', [PoaController::class, 'poa2'])->name('poa2');
Route::post('/poa/update', [PoaController::class, 'update'])->name('poa.update');
Route::post('/poa/delete', [PoaController::class, 'delete'])->name('poa.delete');
Route::get('/poa2/{id_poa}/Gestion_cursos2', [PoaController::class, 'Gestion_cursos2'])->name('poa.Gestion_cursos2');
Route::get('/poa2/cursos/{id}/detalle', [PoaController::class, 'detalle'])->name('curso_detalle');