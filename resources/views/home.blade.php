@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="category-cards">
            <div class="ending-shadow"></div>
            <ul>
                @foreach ($categories as $category)<li class="category-card" style="background-color:{{ $category->color }}">
                        <a href="{{ url('kategori/' . $category->slug) }}">{{ $category->name }}</a>
                </li>@endforeach
            </ul>
        </div>
        <div class="flex space-between">
            @include('layouts.leftbar')
            <div class="content">
                <ul class="project-cards">
                    <h2 class="content-title">
                        <img src="{{ URL::asset('img/fire.gif') }}" height="30">&nbsp Bugün En Çok Ateşlenenler
                    </h2>
                    @include('layouts._project_list')

                </ul>
            </div>
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection
