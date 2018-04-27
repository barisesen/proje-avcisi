@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container flex space-between">
        @include('layouts.leftbar')
        <div class="content">
            <ul class="project-cards">
                <h2><img src="img/fire.gif" height="30">&nbsp Bugün En Çok Ateşlenenler</h2>
                @for ($i = 0; $i < 5; $i++)
                    <li class="project-card">

                    </li>
                @endfor
            </ul>
        </div>
        @include('layouts.sidebar')
    </div>
</div>
@endsection
