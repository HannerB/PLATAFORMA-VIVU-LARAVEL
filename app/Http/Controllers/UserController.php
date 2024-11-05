<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\YTipoUsuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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

        if ($request->hasFile('img')) {
            $imagen = $request->file('img');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();

            // Almacenar la nueva imagen
            $imagen->storeAs('public/img', $nombreImagen);
            $user->img = $nombreImagen;
        }

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
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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
            // Eliminar imagen anterior si existe
            if ($user->img && Storage::disk('public')->exists('img/' . $user->img)) {
                Storage::disk('public')->delete('img/' . $user->img);
            }

            $imagen = $request->file('img');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->storeAs('public/img', $nombreImagen);
            $user->img = $nombreImagen;
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
            return redirect()->route('welcome');
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
            'txtNombres' => 'required',
            'txtApellidos' => 'required',
            'txtSexo' => 'required',
            'txtTipoDocumento' => 'required',
            'txtDocumento' => 'required|unique:users,documento',
            'txtFechaNacimiento' => 'required|date',
            'txtTelefono' => 'required',
            'txtTipoPoblacion' => 'required',
            'txtMunicipio' => 'required',
            'txtCorreo' => 'required|email|unique:users,email',
            'txtPassword' => 'required|min:8',
        ]);

        $aprendizRol = YTipoUsuario::where('nombre', 'Aprendiz')->first();

        $user = new User();
        $user->nombres = $request->txtNombres;
        $user->apellidos = $request->txtApellidos;
        $user->sexo = $request->txtSexo;
        $user->tipodocumento = $request->txtTipoDocumento;
        $user->documento = $request->txtDocumento;
        $user->fechaNacimiento = $request->txtFechaNacimiento;
        $user->telefono = $request->txtTelefono;
        $user->tipoPoblacion = $request->txtTipoPoblacion;
        $user->centro = $request->txtCentro;
        $user->municipio = $request->txtMunicipio;
        $user->email = $request->txtCorreo;
        $user->password = Hash::make($request->txtPassword);
        $user->rol = $aprendizRol ? $aprendizRol->id : null;
        $user->fechaRegistro = now();
        $user->save();

        return redirect()->route('login')->with('success', 'Se ha registrado correctamente.');
    }

    public function mostrarImagen($id)
    {
        $user = User::findOrFail($id);

        if (!$user->img) {
            // Retornar imagen por defecto
            $defaultPath = public_path('img/default-user-img.jpg');
            if (file_exists($defaultPath)) {
                return response()->file($defaultPath);
            }
            abort(404);
        }

        $rutaImagen = storage_path('app/public/img/' . $user->img);

        if (file_exists($rutaImagen)) {
            return response()->file($rutaImagen);
        }

        // Si la imagen del usuario no existe, retornar imagen por defecto
        $defaultPath = public_path('img/default-user-img.jpg');
        if (file_exists($defaultPath)) {
            return response()->file($defaultPath);
        }

        abort(404);
    }
}
