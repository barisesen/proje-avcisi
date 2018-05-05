@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="head-content">
            <div class="head-mid">
                <div class="profile-image">
                    <img src="{{ URL::asset('img/users/default.png') }}" class="profile-image" alt="">
                </div>
                <h1 class="profile-title">Gürkan Şen</h1>
                <p>Pamukkale Üniversitesi, Frontend developer - İzmir</p>
                <div class="head-bottom">
                    <form class="" action="index.html" method="post">
                        @csrf
                        <button type="submit" class="button green-bg" name="button"><i class="fas fa-thumbtack"></i>&nbsp takip et</button>
                    </form>
                    <ul class="profile-nav">
                        <li class="profile-nav-active"><a href="#"><span>20</span> Ateşlenen</a></li>
                        <li><a href="#"><span>32</span> Takipçi</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex space-between">
            <div class="leftbar">
                <div class="card">
                    <ul class="social-links">
                        <li><a href="#"><i class="fab fa-facebook"></i>&nbsp Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i>&nbsp Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i>&nbsp Instagram</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i>&nbsp Linkedin</a></li>
                        <li><a href="#"><i class="fab fa-medium"></i>&nbsp Medium</a></li>
                        <li><a href="#"><i class="fab fa-spotify"></i>&nbsp Spotify</a></li>
                        <li><a href="#"><i class="fab fa-blogger"></i>&nbsp Blogger</a></li>
                        <li><a href="#"><i class="fab fa-soundcloud"></i>&nbsp SoundCloud</a></li>
                        <li><a href="#"><i class="fab fa-dribbble-square"></i>&nbsp Dribbble</a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i>&nbsp Youtube</a></li>
                        <li><a href="#"><i class="fab fa-behance"></i>&nbsp Behance</a></li>
                        <li><a href="#"><i class="fab fa-codepen"></i>&nbsp Codepen</a></li>
                        <li><a href="#"><i class="fab fa-github"></i>&nbsp Github</a></li>
                        <li><a href="#"><i class="fab fa-tumblr-square"></i>&nbsp Tumblr</a></li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <ul class="project-cards">
                    <h2 class="content-title">
                        <img src="{{ URL::asset('img/fire.gif') }}" height="30">&nbsp Ateşledikleri (20)
                    </h2>
                    @for ($i = 0; $i < 5; $i++)
                        <li class="project-card">
                            <div class="project-card-inside flex space-between">
                                <div class="project-image">
                                    <img src="{{ URL::asset('img/app2.png') }}" alt="">
                                </div>
                                <div class="project-info">
                                    <h2 class="project-name"><a href="#">Dribbble</a></h2>
                                    <p class="project-description">Dribbble is where designers get inspired and hired.</p>
                                    <div class="project-bottom flex space-between">
                                        <div class="project-category">
                                            <a class="category-chip" href="{{ url('kategori/yazilim') }}"><i class="fas fa-columns"></i> Tasarım</a>
                                        </div>
                                        <div class="card-buttons flex flex-end">
                                            <form class="" action="" method="POST">
                                                <button type="button" class="button card-button" name="button"><i class="far fa-comment"></i>&nbsp Yorumla (2)</button>
                                            </form>
                                            <form class="" action="" method="POST">
                                                <button type="button" class="button card-button" name="button"><i class="fas fa-fire"></i>&nbsp Ateşle (8)</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection
