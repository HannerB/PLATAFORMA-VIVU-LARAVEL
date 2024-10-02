@extends('layouts.app')

@section('title', 'Inicio | Oferta Complementaria')

@section('content')
<div class="container down">
    <main class="contentContainer">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for ($i = 0; $i < 5; $i++)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" @if($i == 0) class="active" @endif></li>
                @endfor
            </ol>
            <div class="carousel-inner">
                @foreach(['slider0.jpg', 'slider1.jpg', 'slider2.jpg', 'slider3.jpg', 'slider4.jpg'] as $index => $image)
                    <div class="carousel-item @if($index == 0) active @endif">
                        <img class="d-block w-100" src="{{ asset('img/carousel/' . $image) }}" alt="Slide {{ $index + 1 }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5></h5>
                            <p></p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="cardHome">
            <div class="cardHomeHeader">
                <span>Formación complementaria</span>
            </div>
            <div class="cardHomeContent">
                <div class="cardHomeContentImage">
                    <img src="{{ asset('img/formacion/formacion_complementaria.jpg') }}" alt="Logosena" />
                </div>
                <div class="cardHomeContentDescription">
                    <div class="description" style="font-size:17px;">
                        <p>La formación complementaria está orientada a preparar al aprendiz para desempeñar oficios y ocupaciones requeridas por los sectores productivos y sociales, con el fin de satisfacer necesidades del nuevo talento o de cualificación de trabajadores que estén o no vinculados al mundo laboral, a través de cursos cortos de formación.</p>
                    </div>
                    <div class="button">
                        <a href="" class="Link">Inscribirse</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="cardHome">
            <div class="cardHomeHeader">
                <span>Emprendimiento</span>
            </div>
            <div class="cardHomeContent">
                <div class="cardHomeContentImage">
                    <img src="{{ asset('img/formacion/formacion_emprendimiento.jpg') }}" alt="Emprendimiento" />
                </div>
                <div class="cardHomeContentDescription">
                    <div class="description" style="font-size:17px;">
                        <p>Fomentar la cultura del emprendimiento identificando oportunidades e ideas de negocio con valores diferenciales impulsando y fortaleciendo el desarrollo empresarial para la generación de ingresos y el empleo formal y decente. Acompañamos a los emprendedores en la creación y puesta en marcha de sus empresas. <br>
                        Con nuestra asesoría los emprendedores podran: identificar modelos de negocio, formulación de plan de negocio, creación de empresa, asesoría en la fase inicial, diagnóstico empresarial, desarrollo de nuevos productos, encadenamientos productivos y gestión para acceder a fuentes de financiación.</p>
                    </div>
                    <div class="button">
                        <a href="" class="Link">Inscribirse</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="cardHome">
            <div class="cardHomeHeader">
                <span>Certificación por competencias</span>
            </div>
            <div class="cardHomeContent">
                <div class="cardHomeContentImage">
                    <img src="{{ asset('img/formacion/formacion_certificacion.jpg') }}" alt="Certificacion" />
                </div>
                <div class="cardHomeContentDescription">
                    <div class="description" style="font-size:17px;">
                        <p>La certificación por competencias u oficios es un programa orientado a desempeñar oficios y ocupaciones, basados en su experiencia y el desempeño actual de sus habilidades en un campo especifico, guiándolo a través del proceso de certificación, con lo cual le garantiza al sector productivo que es un aliado integral no solo competente en su saber y hacer, sino también en su ser.</p>
                    </div>
                    <div class="button">
                        <a href="" class="Link">Inscribirse</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@section('extra_scripts')
<script>
    $(document).ready(function() {
        $('#exampleModalCenter').modal('toggle')
    });

    var dummyContent = $('.dummy-content').children(),
        i;

    $('#add-content').click(function(e) {
        e.preventDefault();

        if ($(dummyContent[0]).is(":visible")) {
            for (i = 0; i < dummyContent.length; i++) {
                $(dummyContent[i]).fadeOut(600);
            }
        } else {
            for (i = 0; i < dummyContent.length; i++) {
                $(dummyContent[i]).delay(600 * i).fadeIn(600);
            }
        }
    });
</script>
@endsection