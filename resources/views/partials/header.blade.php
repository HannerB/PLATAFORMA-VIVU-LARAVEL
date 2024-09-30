<div class="navHeader">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div>
            <a href="{{ url('/') }}"><img width="215px" src="{{ asset('assets/Logosimbolo.png') }}" alt="Logosena" /></a>
          </div>
          <nav class="full-width NavBar-Nav">
            <div class="full-width NavBar-Nav-bg hidden-md hidden-lg show-menu-mobile"></div>
            <ul class="list-unstyled menu-mobile-c mr-1">
              <div class="full-width hidden-md hidden-lg header-menu-mobile">
                <i class="fa fa-times header-menu-mobile-close-btn show-menu-mobile" aria-hidden="true"></i>
                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <div>
                        <a href="{{ url('/') }}"><img width="215px" src="{{ asset('assets/Logosimbolo.png') }}" alt="Logosena" /></a>
                      </div>
                    </center>
                  </div>
                </div>
                <div class="divider"></div>
              </div>
              <li class="menu">
                <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/" target="_blank">
                  <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> SOFIAPLUS
                </a>
              </li> 
              <li class="menu">
                <a href="https://agenciapublicadeempleo.sena.edu.co/Paginas/inicio.aspx" target="_blank">
                  <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> APE
                </a>
              </li> 
              <li class="menu">
                <a href="">
                  <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> CURSOS
                </a>
              </li>
              <li class="menu">
                <a href="">
                  <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i>NOTICIAS
                </a>
              </li>
              <li>
                @auth
                  <a href="{{ route('perfil') }}">
                    <i class="fa fa-user fa-fw hidden-md hidden-lg" aria-hidden="true"></i> {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                  </a>
                  <li class="hidden-xs hidden-sm">
                    <img class="NavBar-Nav-icon btn-PopUpLogin" src="{{ asset('assets/default-user-img.jpg') }}" alt="">
                  </li>
                @else
                  <a href="{{ route('login') }}">
                    <i class="fa fa-user fa-fw hidden-md hidden-lg" aria-hidden="true"></i> INICIAR SESION
                  </a>
                  <li class="hidden-xs hidden-sm">
                    <img class="NavBar-Nav-icon btn-PopUpLogin" src="{{ asset('assets/default-user-img.jpg') }}" alt="">
                  </li>
                @endauth
              </li>
            </ul>
          </nav>
          <i class="fa fa-bars hidden-md hidden-lg btn-mobile-menu show-menu-mobile" aria-hidden="true"></i>
        </div>
      </div>
    </div>
  </div>
  
  @auth
  <div class="mt-4 PopUpContainer">
    <div class="contentContainer">
    </div>
    <section class="full-width PopUpLogin PopUpLogin-2">
      <div class="full-width">
        <a href="{{ route('perfil') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Tu perfil</a>
        <a href="{{ route('poa') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Gestion Poa</a>
        @if(Auth::user()->rol == 1)
          <a href="{{ route('tablero') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Configuracion</a>
        @endif
        <a href="{{ route('planeacion') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Planeacion</a>
        <a href="{{ route('poa2') }}"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Otros Poa asignados</a>    
        <div role="separator" class="divider"></div>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </section>
  </div>
  @else
  <div class="mt-4 PopUpContainer">
    <div class="contentContainer">
    </div>
    <section class="full-width PopUpLogin PopUpLogin-2">
      <div class="full-width">
        <a href="{{ route('login') }}">
          <i class="fa fa-sign-in fa-fw" aria-hidden="true"></i>Iniciar sesion
        </a>            
      </div>
    </section>
  </div>
  @endauth