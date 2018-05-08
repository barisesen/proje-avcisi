@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="sm-container">
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

                <h3 class="card-title"><img src="{{ URL::asset('img/fire.gif') }}" height="30">&nbsp Ateşleyenler (8)</h3>
                <div class="flex space-between">
                    <ul class="liked-users">
                        @for($i = 0; $i <= 20; $i++)<li>
                            <a href="{{ url('uye/gurkansen') }}">
                                <img src="{{ URL::asset('img/users/default.png')}}" class="circle-image size-36" alt="">
                            </a>
                        </li>@endfor
                    </ul>
                </div>

            </div><!-- card ends -->
        </div><!-- content ends -->
    </div>
</div>
@endsection
