@extends('layouts.app')

@section('title', 'Noticias | Oferta Complementaria')

@section('content')
    <div class="text-center">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for ($i = 0; $i < 5; $i++)
                        <li class="bg-primary" data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" @if($i == 0) class="active" @endif></li>
                    @endfor
                </ol>
                <div class="carousel-inner">
                    @foreach(['slider_0.jpg', 'slider_1.jpg', 'slider_2.jpg', 'img_4_.jpg', 'slider_4.jpg'] as $index => $image)
                        <div class="carousel-item @if($index == 0) active @endif">
                            <img class="d-block w-100" src="{{ asset('img/carousel/noticias/' . $image) }}" alt="Slide {{ $index + 1 }}">
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

            <div class="row mt-2 mx-auto">
                <div class="col-md-8">
                    @foreach ([['video' => 'video_1.mp4', 'title' => 'Emprendedora SENA'], ['video' => 'video_2.mp4', 'title' => 'Emprendedora SENA'], ['image' => 'imgPortada2.jpeg', 'title' => 'Apertura de la fería de emprendimiento población'], ['image' => 'imgPortada1.jpeg', 'title' => 'Cronograma de la fería de emprendimiento población']] as $item)
                        <div class="form-group col-md-6">
                            <div class="card h-100" style="width: 22rem;">
                                @if (isset($item['video']))
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video width="400" controls>
                                            <source src="{{ asset('videos/noticias/' . $item['video']) }}" type="video/mp4">
                                        </video>
                                    </div>
                                @else
                                    <img class="img-fluid" src="{{ asset('img/noticias/' . $item['image']) }}">
                                @endif
                                <div class="card-body mt-1">
                                    <h5 class="card-title">{{ $item['title'] }}</h5>
                                    <p class="card-text">1° Feria de emprendedores pertenecientes a la población víctima y
                                        vulnerable.</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Última actualización 15/09/2021.</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4 overflow-auto">
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FsenaAtlantico&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                        width="320" height="460" style="border:none;overflow:hidden; border-radius:10px;"
                        scrolling="no" frameborder="0" allowfullscreen="true"
                        allow="clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <a class="twitter-timeline" data-width="320" data-height="460" data-theme="dark"
                        href="https://twitter.com/SenaAtlantico?ref_src=twsrc%5Etfw">Tweets by SenaAtlantico</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script>
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
@endpush
