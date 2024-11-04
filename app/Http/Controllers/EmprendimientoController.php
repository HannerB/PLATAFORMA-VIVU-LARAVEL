<?php

namespace App\Http\Controllers;

use App\Models\Emprendimiento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmprendimientoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class EmprendimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.emprendimiento.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $emprendimiento = new Emprendimiento();

        return view('emprendimiento.create', compact('emprendimiento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'txtRegional' => 'required|string|max:100',
            'txtCentro' => 'required|string|max:100',
            'txtCodigoProyecto' => 'required|string|max:100',
            'txtNombres' => 'required|string|max:100',
            'txtApellidos' => 'required|string|max:100',
            'txtDocumento' => 'required|string|max:100',
            'txtFechaNacimiento' => 'required|date',
            'txtCiudadNacimiento' => 'required|string|max:100',
            'txtDepartamentoNacimiento' => 'required|string|max:100',
            'txtCorreo' => 'required|email|max:200',
            'txtGenero' => 'required|in:Masculino,Femenino,Prefiero no decirlo',
            'txtTelefonoOficina' => 'required|string|max:20',
            'txtTelefonoMovil' => 'required|string|max:20',
            'txtDireccion' => 'required|string|max:100',
            'txtCiudadResidencia' => 'required|string|max:100',
            'txtDepartamentoResidencia' => 'required|string|max:100',
            'txtCaracterizacion' => 'required|string|max:100',
            'txtFormacion' => 'nullable|string|max:100',
            'txtProgramaFormacion' => 'required|string|max:100',
            'txtInstitucion' => 'required|string|max:100',
            'txtEstadoInstitucion' => 'required|in:En Curso,Finalizado',
            'txtServicio' => 'required|string|max:100',
            'txtEmpresa' => 'required|string|max:100',
            'txtNit' => 'required|string|max:100',
            'txtEstatus' => 'required|string|max:100',
            'txtFechaConstitucion' => 'required|date',
            'txtRepresentanteLegal' => 'required|string|max:100',
            'txtTamanoEmpresa' => 'required|in:Micro,Pequeña,Mediana',
            'txtActividadEconomica' => 'required|string|max:100',
            'txtSectorEconomico' => 'required|string|max:100',
            'txtTipoSociedad' => 'required|string|max:100',
            'txtDireccionEmpresa' => 'required|string|max:100',
            'txtPaginaWeb' => 'nullable|string|max:100',
            'txtCiudadEmpresa' => 'required|string|max:100',
            'txtDepartamentoEmpresa' => 'required|string|max:100',
            'txtCorreoEmpresa' => 'required|email|max:100',
            'txtNumeroEmpleosFormales' => 'required|string|max:10',
            'txtNumeroEmpleosInformales' => 'required|string|max:10',
            'txtDescripcion' => 'required|string|max:500',
            'txtVendeInternet' => 'required|in:SI,NO',
            'txtNegocioCasa' => 'required|in:SI,NO',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser texto.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
            'email' => 'El campo :attribute debe ser un correo válido.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
            'in' => 'El valor seleccionado para :attribute no es válido.'
        ]);

        try {
            $emprendimiento = Emprendimiento::create([
                'regional' => $request->txtRegional,
                'centroFormacion' => $request->txtCentro,
                'codigoProyecto' => $request->txtCodigoProyecto,
                'nombresPersonal' => $request->txtNombres,
                'apellidosPersonal' => $request->txtApellidos,
                'documentoPersonal' => $request->txtDocumento,
                'fechaNacimiento' => $request->txtFechaNacimiento,
                'ciudadNacimiento' => $request->txtCiudadNacimiento,
                'departamentoNacimiento' => $request->txtDepartamentoNacimiento,
                'correoPersonal' => $request->txtCorreo,
                'genero' => $request->txtGenero,
                'telefonoOficinaPersonal' => $request->txtTelefonoOficina,
                'telefonoMovilPersonal' => $request->txtTelefonoMovil,
                'direccionResidencia' => $request->txtDireccion,
                'ciudadResidencia' => $request->txtCiudadResidencia,
                'departamentoResidencia' => $request->txtDepartamentoResidencia,
                'tipoPoblacionPersonal' => $request->txtCaracterizacion,
                'formacionAcademica' => $request->txtFormacion,
                'programaFormacion' => $request->txtProgramaFormacion,
                'institucionAcademica' => $request->txtInstitucion,
                'estadoAcademica' => $request->txtEstadoInstitucion,
                'servicioRequerido' => $request->txtServicio,
                'nombreEmpresa' => $request->txtEmpresa,
                'nitEmpresa' => $request->txtNit,
                'estatusEmpresa' => $request->txtEstatus,
                'fechaConstitucionEmpresa' => $request->txtFechaConstitucion,
                'representanteEmpresa' => $request->txtRepresentanteLegal,
                'tamanoEmpresa' => $request->txtTamanoEmpresa,
                'actividadEconomicaEmpresa' => $request->txtActividadEconomica,
                'sectorEconomicoEmpresa' => $request->txtSectorEconomico,
                'tipoSociedadEmpresa' => $request->txtTipoSociedad,
                'direccionEmpresa' => $request->txtDireccionEmpresa,
                'paginaWebEmpresa' => $request->txtPaginaWeb,
                'ciudadEmpresa' => $request->txtCiudadEmpresa,
                'departamentoEmpresa' => $request->txtDepartamentoEmpresa,
                'correoEmpresa' => $request->txtCorreoEmpresa,
                'empleadosFormales' => $request->txtNumeroEmpleosFormales,
                'empleadosInformales' => $request->txtNumeroEmpleosInformales,
                'descripcionProductosEmpresa' => $request->txtDescripcion,
                'internetEmpresa' => $request->txtVendeInternet,
                'negocioEnCasa' => $request->txtNegocioCasa
            ]);

            return redirect()->route('emprendimiento.consultar')
                ->with('success', 'Formulario de emprendimiento guardado exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error al guardar emprendimiento: ' . $e->getMessage());
            return back()->with('error', 'Error al guardar el formulario: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $emprendimiento = Emprendimiento::find($id);

        return view('emprendimiento.show', compact('emprendimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $emprendimiento = Emprendimiento::find($id);

        return view('emprendimiento.edit', compact('emprendimiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmprendimientoRequest $request, Emprendimiento $emprendimiento): RedirectResponse
    {
        $emprendimiento->update($request->validated());

        return Redirect::route('emprendimientos.index')
            ->with('success', 'Emprendimiento updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Emprendimiento::find($id)->delete();

        return Redirect::route('emprendimientos.index')
            ->with('success', 'Emprendimiento deleted successfully');
    }

    public function consultar()
    {
        try {
            $emprendimientos = Emprendimiento::select([
                'nombresPersonal',
                'apellidosPersonal',
                'documentoPersonal',
                'genero',
                'correoPersonal',
                'telefonoMovilPersonal',
                'id'
            ])->paginate(10);

            // Cambiar esta línea para que coincida con tu estructura de carpetas
            return view('pages.emprendimiento.consultar', compact('emprendimientos'));
        } catch (\Exception $e) {
            Log::error('Error en consulta de emprendimientos: ' . $e->getMessage());
            return back()->with('error', 'Error al cargar los datos: ' . $e->getMessage());
        }
    }
}
