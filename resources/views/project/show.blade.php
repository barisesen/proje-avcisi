@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="mid-container">
        <div class="flex space-between">
            <div class="content">
                <div class="card">
                    <div class="single-content-top flex">
                        <div class="single-content-img">
                            <img src="{{ URL::asset('img/app2.png') }}" alt="">
                        </div>
                        <div class="single-content-info">
                            <h1>Dribbble</h1>
                            <a href="#" class="category-chip" style="background-color: {{ 'pink' }}">Tasarım</a>
                        </div>
                    </div>
                    <div class="single-content-mid">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/MTGyJoaFSH4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        <p>
                            Dribbble launched a new featured called Scout and designers aren't to happy about it.

                            Welcome to another episode of the @DannPetty show — a weekly show where we talk about random design related stories.

                            This week we talk about:

                            — Dribbble
                            — The new Pinterest Logo
                            — J.K. Rowling on Design Twitter
                            — Laura Kalbag's Book
                            — Epicurrence

                            Links:
                            https://www.dribbble.com
                        </p>
                    </div>
                </div><!-- card ends -->
                <div class="card">
                    <h3 class="card-title"><img src="{{ URL::asset('img/fire.gif') }}" height="30">&nbsp Ateşleyenler (8)</h3>
                    <div class="flex space-between">
                        <ul class="liked-users">
                            @for($i = 0; $i <= 10; $i++)<li>
                                <a href="{{ url('uye/gurkansen') }}">
                                    <img src="{{ URL::asset('img/users/default.png')}}" class="circle-image size-36" alt="">
                                </a>
                            </li>@endfor
                        </ul>
                        <a href="{{ url('proje/1/asd/atesleyenler') }}" class="view-all">Tümü</a>
                    </div>
                </div>
                <div class="card">
                    <h3 class="card-title">Yorumlar (3)</h3>
                    <ul class="comments">
                        @for ($i = 0; $i < 10; $i++)
                        <li class="comment flex">
                            <a href="{{ url('uye/gurkansen') }}">
                                <img src="{{ URL::asset('img/users/default.png')}}" class="circle-image size-42" alt="">
                            </a>
                            <div class="comment-right">
                                <a href="#">Gürkan Şen</a>
                                <p>Selam</p>
                            </div>
                        </li>
                        @endfor
                    </ul>
                </div>
            </div><!-- content ends -->
            <div class="sidebar">
                <form class="" action="index.html" method="post">
                    @csrf
                    <button type="button" class="button full-btn blue-bg side-btn" name="button"><i class="fas fa-fire"></i>&nbsp Ateşle (8)</button>
                </form>
                <div class="card">
                    <h3 class="card-title">Proje Bağlantıları</h3>
                    <ul class="card-links">
                        <li><a href="#"><i class="fas fa-link"></i>&nbsp Projeyi ziyaret et</a></li>
                        <li><a href="#"><i class="fab fa-apple"></i>&nbsp App Store'da Gör</a></li>
                        <li><a href="#"><i class="fab fa-android"></i>&nbsp Play Store'da Gör</a></li>
                    </ul>
                </div>
                <div class="card sm-padding">
                    <p><i class="fas fa-eye"></i>&nbsp 28 Görüntülenme</p>
                    <p><i class="fas fa-user-circle"></i>&nbsp <a href="#">Gürkan Şen</a> paylaştı.</p>
                </div>
                <div class="card">
                    <h3 class="card-title">Şunlarla ilgili</h3>
                    <ul class="tool-chips">
                        <li><a href="#">#sosyal ağ</a></li>
                        <li><a href="#">#flört</a></li>
                        <li><a href="#">#ilişki</a></li>
                        <li><a href="#">#falan</a></li>
                    </ul>
                </div>
                <div class="card">
                    <h3 class="card-title">Paydaşlar</h3>
                </div>
                <div class="card">
                    <h3 class="card-title">Kullanılan Araçlar</h3>
                    <ul class="tool-chips">
                        <li><a href="#">#php</a></li>
                        <li><a href="#">#laravel</a></li>
                        <li><a href="#">#sass</a></li>
                        <li><a href="#">#redis</a></li>
                        <li><a href="#">#javascript</a></li>
                        <li><a href="#">#jquery</a></li>
                    </ul>
                </div>
                <div class="card">
                    <h3 class="card-title">Paylaş, destekle</h3>
                    <ul class="tool-chips">
                        <li><a href="#"><i class="fab fa-facebook"></i>&nbsp Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter-square"></i>&nbsp Twitter</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i>&nbsp Linkedin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
