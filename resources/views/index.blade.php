<!DOCTYPE html>
<html lang="en">
<head>
    <title>42 Kafası</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900">

    <link rel="stylesheet" href="{{asset('assets/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">

    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <style>
        h3 {
            color: #50a5a0;
        }
    </style>

</head>
<body>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar d-flex py-4 absolute transparent" role="banner">
        <div class="container ">
            <div class="col-12" data-aos="fade-down">
                <h1 class="text-center"><a href="#" class="text-white" style="font-size: 50px">42 Kafası</a></h1>
            </div>
        </div>
    </header>

    <div class="site-blocks-cover overlay" style="background-image: url({{asset('assets/images/42kfimage.jpeg')}});" data-aos="fade"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">

                    <h2 class="text-white font-weight-light mb-2 display-4 f" style="font-size: 50px">42 Kafasına
                        Hoşgeldiniz</h2>
                    <div class="text-white mb-4"><small class="text-white-opacity-05 h3">
                            <small>Bu podcast dünyasında 42 öğrencileri olarak günlük yaşanan kafaları sizlere
                                anlatacağız</small>
                        </small></div>

                    <div class="col-12" style="margin-top: -150px">
                        <div class="player">
                            <audio id="player2" preload="none" controls style="max-width: 100%">
                                <source src="/storage/{{$latestFeed->src_url ?? null}}" type="audio/mp3">
                            </audio>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row mb-5" data-aos="fade-up">
                <div class="col-md-12 text-center">
                    <h2 class="font-weight-bold text-black">Son Podcasts'ler</h2>
                </div>
            </div>

            @foreach($feeds as $feed)
                <div class="d-block d-md-flex podcast-entry bg-white mb-5" data-aos="fade-up">
                    <div class="image" style="background-image: url('/storage/{{$feed->image}}');"></div>
                    <div class="text">

                        <h3 class="font-weight-light">{{$feed->title}}</h3>
                        <div class="text-white mb-3"><span class="text-black-opacity-05"><small>Ali Karabay<span
                                        class="sep">/</span>{{$feed->created_at->diffForHumans()}} <span
                                        class="sep">/</span> 1:30:20</small></span>
                        </div>
                        <p class="mb-4">{{$feed->description}}</p>

                        <div class="player">
                            <audio id="player2" preload="none" controls style="max-width: 100%">
                                <source src="/storage/{{$feed->src_url}}"
                                        type="audio/mp3">
                            </audio>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
        {{$feeds->links('vendor.pagination.default')}}

    </div>

    <div class="site-section">
        <div class="container" data-aos="fade-up">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2 class="font-weight-bold text-black">Mikrofon Arkasında</h2>
                </div>
            </div>
            <div class="row">
                @foreach($speakers as $speaker)
                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                        <div class="team-member">

                            <img src="/storage/{{$speaker->avatar}}" alt="Image" class="img-fluid">

                            <div class="text">

                                <h2 class="mb-2 font-weight-light h4">{{$speaker->name}}</h2>
                                <span class="d-block mb-2 text-white-opacity-05">{{$speaker->job}}</span>
                                <p class="mb-4">
                                    {{$speaker->description}}
                                </p>
                                <p>
                                    <a href="{{$speaker->instagram}}" class="text-white p-2"><span class="icon-facebook"></span></a>
                                    <a href="{{$speaker->twitter}}" class="text-white p-2"><span class="icon-twitter"></span></a>
                                    <a href="{{$speaker->linkedin}}" class="text-white p-2"><span class="icon-linkedin"></span></a>
                                </p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <p>
                        Copyright &copy;<script data-cfasync="false"
                                                src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script>document.write(new Date().getFullYear());</script>
                        <a href="https://www.karabayyazilim.com" target="_blank">Karabay Yazılım</a>
                    </p>
                </div>

            </div>
        </div>
    </footer>
</div>

<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/aos.js')}}"></script>

<script src="{{asset('assets/js/mediaelement-and-player.min.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

        for (var i = 0; i < total; i++) {
            new MediaElementPlayer(mediaElements[i], {
                pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                shimScriptAccess: 'always',
                success: function () {
                    var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                    for (var j = 0; j < targetTotal; j++) {
                        target[j].style.visibility = 'visible';
                    }
                }
            });
        }
    });
</script>

<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>
