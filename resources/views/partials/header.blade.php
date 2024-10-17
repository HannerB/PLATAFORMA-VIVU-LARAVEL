<div class="navHeader">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <a href="{{ url('/') }}"><img width="215px" src="{{ asset('img/Logosimbolo.png') }}"
                            alt="Logosena" /></a>
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
                                            <a href="{{ url('/') }}"><img width="215px"
                                                    src="{{ asset('img/Logosimbolo.png') }}" alt="Logosena" /></a>
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
                            <a href="{{ route('cursos.index') }}">
                                <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> CURSOS
                            </a>
                        </li>
                        <li class="menu">
                            <a href="{{ route('noticias') }}">
                                <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i>NOTICIAS
                            </a>
                        </li>
                        <li>
                            @auth
                                <a href="{{ route('perfil') }}">
                                    <i class="fa fa-user fa-fw hidden-md hidden-lg" aria-hidden="true"></i>
                                    {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}
                                </a>
                            <li class="hidden-xs hidden-sm">
                                <img class="NavBar-Nav-icon btn-PopUpLogin" src="{{ asset('img/default-user-img.jpg') }}"
                                    alt="">
                            </li>
                        @else
                            <a href="{{ route('login') }}">
                                <i class="fa fa-user fa-fw hidden-md hidden-lg" aria-hidden="true"></i> INICIAR SESION
                            </a>
                            <li class="hidden-xs hidden-sm">
                                <img class="NavBar-Nav-icon btn-PopUpLogin" src="{{ asset('img/default-user-img.jpg') }}"
                                    alt="">
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
        <x-popup-login />
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

<!-- Pie de pagina -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
    integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"
    integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js"
    integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"
    integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous">
</script>
