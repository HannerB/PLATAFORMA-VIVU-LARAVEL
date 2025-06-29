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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlaneacionController;
use App\Http\Controllers\CertificacionController;
use App\Http\Controllers\ValidacionActasController;

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function () {

    // USER
    Route::get('/perfil', [UserController::class, 'index'])->name('perfil');

    // CURSOS
    Route::get('/cursos-ofertados', [CursoController::class, 'ofertados'])->name('cursos.ofertados');
    Route::post('/cursos/inscribir', [CursoController::class, 'inscribir'])->name('inscribir.curso')->middleware('auth');

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/grafico-uno', [DashboardController::class, 'graficoUno'])->name('dashboard.grafico-uno');
    Route::get('/dashboard/grafico-dos', [DashboardController::class, 'graficoDos'])->name('dashboard.grafico-dos');
    Route::get('/dashboard/grafico-tres', [DashboardController::class, 'graficoTres'])->name('dashboard.grafico-tres');
    Route::get('/dashboard/grafico-cuatro', [DashboardController::class, 'graficoCuatro'])->name('dashboard.grafico-cuatro');

    // POA
    Route::get('/poa', [PoaController::class, 'index'])->name('poa');
    Route::post('/poa/store', [PoaController::class, 'store'])->name('poa.store');
    Route::post('/poa/update', [PoaController::class, 'update'])->name('poa.update');
    Route::delete('/poa/{id}', [PoaController::class, 'destroy'])->name('poa.destroy');

    Route::get('/poa2', [PoaController::class, 'otrosPoaAsignados'])->name('poa2')->middleware('role:Orientador,Aprendiz');
    Route::get('/poa2', [PoaController::class, 'poa2'])->name('poa2');
    Route::post('/poa/update', [PoaController::class, 'update'])->name('poa.update');
    Route::post('/poa/delete', [PoaController::class, 'delete'])->name('poa.delete');

    Route::get('/planeacion', [PoaController::class, 'planeacion'])->name('planeacion');

    //GESTION-CURSOS
    Route::resource('gestion-curso', GestionCursoController::class);
    Route::get('/poa/{id}/gestion-cursos', [GestionCursoController::class, 'Gestion_cursos'])->name('poa.gestion-cursos');
    Route::put('/gestion-cursos/{id}/actualizar', [GestionCursoController::class, 'actualizarCurso'])->name('gestion-cursos.actualizar');
    Route::delete('/gestion-cursos/{id}/eliminar', [GestionCursoController::class, 'eliminarCurso'])->name('gestion-cursos.eliminar');

    Route::get('/poa2/{id_poa}/Gestion_cursos2', [GestionCursoController::class, 'Gestion_cursos2'])->name('poa.Gestion_cursos2');
    Route::get('/gestion-cursos/{id}/edit', [GestionCursoController::class, 'edit'])->name('gestion-cursos.edit');
    Route::put('gestion-curso/{id}', [GestionCursoController::class, 'update'])->name('gestion-curso.update');

    //CURSOS-DETALLE
    Route::resource('cursos-detalle', CursosDetalleController::class);
    Route::get('/poa2/gestion-cursos/{id}/cursos-detalle', [CursosDetalleController::class, 'cursosDetalle2'])->name('curso_detalle');


    Route::get('/poa/gestion-cursos/{id}/cursos-detalle', [CursosDetalleController::class, 'cursosDetalle'])->name('gestion-curso.cursos-detalle');
    Route::delete('/cursos-detalle/{id}', [CursosDetalleController::class, 'eliminarInscrito'])->name('cursos-detalle.eliminar');

    // EMPRENDIMIENTO
    Route::get('/emprendimiento', [EmprendimientoController::class, 'index'])->name('emprendimiento.index');
    Route::get('/consultar', [EmprendimientoController::class, 'consultar'])->name('emprendimiento.consultar');
    Route::post('/store', [EmprendimientoController::class, 'store'])->name('emprendimiento.store');

    // ADMIN
    Route::get('/tablero', [AdminController::class, 'tablero'])->name('tablero');
    Route::get('/admin/usuarios/gestionar', [AdminController::class, 'gestionUsuarios'])->name('admin.usuarios.gestionar');
    Route::post('/admin/usuarios/buscar', [AdminController::class, 'buscarUsuario'])->name('admin.buscar-usuario');
    Route::put('/admin/usuarios/actualizar', [AdminController::class, 'actualizarUsuario'])->name('admin.actualizar-usuario');

    // ASIGNAR-MUNICIPIO
    Route::resource('asignar-responsables', AsignarMunicipioController::class);
    Route::resource('asignar-municipio', AsignarMunicipioController::class);

    // ALIANZA-MUNICIPIO
    Route::resource('alianza-municipio', AlianzaMunicipioController::class);
    Route::resource('alianza-municipio', AlianzaMunicipioController::class);
    Route::post('/api/buscar-enlace', [AlianzaMunicipioController::class, 'buscarEnlace']);
    Route::get('/verificar-alianza/{id}', [AlianzaMunicipioController::class, 'verificarEnlace']);
    Route::get('/verificar-alianza-documento/{documento}', function ($documento) {
        return app(AlianzaMunicipioController::class)->verificarEnlace($documento, true);
    });


    // CERTIFICACIONES
    Route::get('/certificaciones', [CertificacionController::class, 'consultar'])->name('certificaciones.consultar');

    // CONCERTACIONES
    Route::resource('concertacione', ConcertacioneController::class);
    Route::get('/concertaciones/{id}/cursos', [ConcertacioneController::class, 'obtenerCursos'])->name('concertaciones.cursos');
    Route::post('/concertaciones/buscar-cursos', [ConcertacioneController::class, 'buscarCursos'])->name('concertaciones.buscar-cursos');
    Route::post('/concertaciones/store', [ConcertacioneController::class, 'store'])->name('concertaciones.store');

    // Rutas de validación (solo para usuarios con permisos)
    Route::post('/actas/{id}/validar', [ValidacionActasController::class, 'validar'])
        ->name('actas.validar')
        ->middleware('can:validate-actas');

    // Ruta de descarga (solo actas validadas)
    Route::get('/actas/{id}/descargar', [ValidacionActasController::class, 'descargar'])
        ->name('actas.descargar');

    // Ver detalle del acta
    Route::get('/actas/{id}/detalle', [ValidacionActasController::class, 'verDetalle'])
        ->name('actas.detalle');
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
Route::resource('no-inscritos-sofiaplu', NoInscritosSofiapluController::class);
Route::resource('grupo', GrupoController::class);
Route::resource('files-concertacione', FilesConcertacioneController::class);
Route::resource('file', FileController::class);
Route::resource('cursos-solicitados', CursosSolicitadoController::class);
Route::resource('curso', CursoController::class);
Route::resource('competencia', CompetenciaController::class);
Route::resource('acceso-registro', AccesoRegistroController::class);
Route::resource('user', UserController::class);

Route::get('/usuarios/{id}/imagen', [UserController::class, 'mostrarImagen'])->name('usuarios.imagen');
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::post('/buscar-inscritos', [YInscritosCursoController::class, 'buscar'])->name('buscar.inscritos');
