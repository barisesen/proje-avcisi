@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="category-cards">
            <ul>
                @foreach ($categories as $category)
                    <li class="category-card" style="background-color:{{ $category->color }}">
                        <a href="#">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="flex space-between">
            @include('layouts.leftbar')
            <div class="content">
                <ul class="project-cards">
                    <h2 class="content-title"><img src="img/fire.gif" height="30">&nbsp Bugün En Çok Ateşlenenler</h2>
                    @for ($i = 0; $i < 5; $i++)
                        <li class="project-card">
                            <div class="project-card-inside flex space-between">
                                <div class="project-image">
                                    <img src="img/app2.png" alt="">
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
