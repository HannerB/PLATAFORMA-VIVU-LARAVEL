@extends('layouts.app')

@section('title', 'Iniciar sesión | Oferta Complementaria')

@section('content')
    <div class="mt-1 PopUpContainer">
        <div class="contentContainer">
            <ol class="breadcrumb">
                <li><a class="text-success" href="{{ route('home') }}">Inicio</a></li>
                <li class="active">Iniciar sesión</li>
            </ol>
        </div>
    </div>

    <div class="container down">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                    <div class="full-width container-login">
                        <i class="fa fa-user container-login-icon" aria-hidden="true"></i>
                        <h2 class="text-center text-light">Iniciar Sesión</h2>
                        <br>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="documento">Documento</label>
                                <input id="documento" type="text"
                                    class="form-control @error('documento') is-invalid @enderror" name="documento"
                                    value="{{ old('documento') }}" required autocomplete="documento" autofocus>
                                @error('documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a href="#" data-toggle="modal" data-target="#passwordResetModal"><i class="fa fa-key"
                                    aria-hidden="true"></i> ¿Olvidaste tu contraseña?</a>
                            <button class="btn btn-success btn-block" type="submit">Iniciar sesión</button>
                        </form>
                        <a href="{{ route('register') }}" class="btn btn-success btn-block">Registrarme</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para recuperar contraseña -->
    <div class="modal fade" id="passwordResetModal" tabindex="-1" role="dialog" aria-labelledby="passwordResetModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordResetModalLabel" style="font-size: 28px; text-align:center;">
                        <i class="fa fa-envelope-open" aria-hidden="true"></i> ¿Olvidaste tu contraseña?
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="documento"><i class="fa fa-envelope" aria-hidden="true"></i> Documento:</label>
                            <input type="number" class="form-control" id="documento" name="documento" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn"
                                style="background-color: #FF6C00; color: white; border-color: #FF6C00;">Recuperar
                                contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
