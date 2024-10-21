<section class="full-width PopUpLogin PopUpLogin-2">
    <div class="full-width">
        <a href="{{ route('perfil') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Tu perfil</a>

        @if (Auth::user()->tipoUsuario->nombre == 'Administrador')
            <a href="{{ route('tablero') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Gestion</a>
            <a href="{{ route('planeacion') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Planeacion</a>
            <a href="{{ route('cursos.ofertados') }}"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Cursos
                ofertados</a>
            <a href="{{ route('dashboard') }}"><i class="fa fa-area-chart fa-fw" aria-hidden="true"></i> Dashboard</a>
        @elseif(Auth::user()->tipoUsuario->nombre == 'Orientador')
            {{-- <a href="{{ route('poa') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Gestion Poa</a> --}}
            {{-- <a href="{{ route('planeacion') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Planeacion</a> --}}
            {{-- @if (Auth::user()->tieneAlianzaActiva()) --}}
                <a href="{{ route('poa2') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Otros Poa asignados</a>
            {{-- @endif --}}
        @elseif(Auth::user()->tipoUsuario->nombre == 'Gestor')
            <a href="{{ route('emprendimiento.consultar') }}"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
                Emprendimiento</a>
            <a href="{{ route('cursos.ofertados') }}"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Cursos
                Ofertados</a>
        {{-- @elseif(Auth::user()->tipoUsuario->nombre == 'Certificación')
            <a href="{{ route('certificaciones.consultar') }}"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
                Certificaciones</a>
            <a href="{{ route('cursos.ofertados') }}"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Cursos
                ofertados</a> --}}
        @elseif(Auth::user()->tipoUsuario->nombre == 'Aprendiz')
            {{-- @if (Auth::user()->tieneAlianzaActiva()) --}}
                <a href="{{ route('poa2') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Otros Poa
                    Asignados</a>
            {{-- @endif --}}
        @endif

        <div role="separator" class="divider"></div>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</section>
