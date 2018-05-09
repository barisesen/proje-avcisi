 @extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="mid-container">
        <div class="flex space-between">
            <div class="content">
                <div class="card">
                    <div class="single-content-top flex">
                        <div class="single-content-img">
                            <img src="{{ URL::asset('img/php.png') }}" class="sml-img" alt="">
                        </div>
                        <div class="single-content-info">
                            <h1>PHP</h1>
                        </div>
                    </div>
                    <div class="single-content-mid">
                        <canvas id="myChart" width="400" height="250"></canvas>
	                </div>
                </div><!-- card ends -->
                <div class="card">
                    <h3 class="card-title">Yorumlar (3)</h3>
                    <ul class="comments">
                        @for ($i = 0; $i < 3; $i++)
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
                <div class="card">
                    <h3 class="card-title">Şunlarla Kıyasla</h3>
                    <ul class="tool-chips">
                        <li><a href="#">#laravel</a></li>
                        <li><a href="#">#sass</a></li>
                        <li><a href="#">#redis</a></li>
                        <li><a href="#">#javascript</a></li>
                        <li><a href="#">#jquery</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
