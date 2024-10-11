<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.perfil', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required',
            'tipodocumento' => 'required',
            'documento' => 'required|unique:users',
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required',
            'tipoPoblacion' => 'required',
            'municipio' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->sexo = $request->sexo;
        $user->tipodocumento = $request->tipodocumento;
        $user->documento = $request->documento;
        $user->fechaNacimiento = $request->fechaNacimiento;
        $user->telefono = $request->telefono;
        $user->tipoPoblacion = $request->tipoPoblacion;
        $user->centro = $request->centro;
        $user->municipio = $request->municipio;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required',
            'tipodocumento' => 'required',
            'documento' => 'required|unique:users,documento,' . $id,
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required',
            'tipoPoblacion' => 'required',
            'municipio' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::find($id);
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->sexo = $request->sexo;
        $user->tipodocumento = $request->tipodocumento;
        $user->documento = $request->documento;
        $user->fechaNacimiento = $request->fechaNacimiento;
        $user->telefono = $request->telefono;
        $user->tipoPoblacion = $request->tipoPoblacion;
        $user->centro = $request->centro;
        $user->municipio = $request->municipio;
        $user->email = $request->email;

        if ($request->hasFile('img')) {
            $imagen = $request->file('img');
            $contenidoImagen = file_get_contents($imagen->getRealPath());
            $tipoArchivo = $imagen->getClientMimeType();
            $user->img = $contenidoImagen;
            $user->tipo_archivo = $tipoArchivo;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('perfil')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully.');
    }

    /**
     * Show the login form.
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('documento', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'documento' => 'Las credenciales proporcionadas no son válidas.',
        ]);
    }

    /**
     * Handle the logout request.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Show the registration form.
     */
    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    /**
     * Handle the registration request.
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'sexo' => 'required',
            'tipodocumento' => 'required',
            'documento' => 'required|unique:users',
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required',
            'tipoPoblacion' => 'required',
            'municipio' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = new User();
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->sexo = $request->sexo;
        $user->tipodocumento = $request->tipodocumento;
        $user->documento = $request->documento;
        $user->fechaNacimiento = $request->fechaNacimiento;
        $user->telefono = $request->telefono;
        $user->tipoPoblacion = $request->tipoPoblacion;
        $user->centro = $request->centro;
        $user->municipio = $request->municipio;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('home');
    }

    public function mostrarImagen($id)
    {
        $user = User::findOrFail($id);
        $rutaImagen = storage_path('app/public/img/' . $user->img);

        if (file_exists($rutaImagen)) {
            $contenidoImagen = file_get_contents($rutaImagen);
            $tipoArchivo = mime_content_type($rutaImagen);
            return response($contenidoImagen)->header('Content-Type', $tipoArchivo);
        }

        abort(404);
    }
}
