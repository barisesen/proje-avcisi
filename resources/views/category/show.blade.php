@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="headline" style="background-color: {{ $category->color }}">
        <div class="container without-padding">
            <h1>{{ $category->name }}</h1>
            @if(auth()->check() && isset($isLiked) && !$isLiked)
                <p><a href="/kategori/{{$category->slug}}/follow" class="button blue-bg side-btn" name="button"><i class="fas fa-fire"></i>&nbsp Takip Et</a></p>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="flex space-between">
            @include('layouts.leftbar')
            <div class="content">
                <ul class="project-cards">
                    <h2 class="content-title">
                        <img src="{{ URL::asset('img/fire.gif') }}" height="30">&nbsp Bu Kategoride En Çok Ateşlenenler
                    </h2>
                    @include('layouts._project_list')
                </ul>
            </div>
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection
