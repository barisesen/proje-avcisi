@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="head-content">
            <div class="head-mid">
                <div class="profile-image">
                    <img src="{{ URL::asset('img/users/default.png') }}" class="profile-image" alt="">
                </div>
                <h1 class="profile-title">{{$user->first_name}} {{$user->last_name}}</h1>
                <p>Pamukkale Üniversitesi</p>
                <div class="head-bottom">
                    @if(auth()->check() && auth()->user()->id != $user->id && $follow)
                    <form class="" action="{{route('store_follow')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="submit" class="button green-bg" name="button"><i class="fas fa-thumbtack"></i>&nbsp Takip et</button>
                    </form>
                    @endif

                    <ul class="profile-nav">
                        <li class="profile-nav-active"><a href="/uye/{{$user->username}}"><span>20</span> Ateşlenen</a></li>
                        <li><a href="#"><span>{{$user->followers->count()}}</span> Takipçi</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex space-between">
            <div class="leftbar">
                <div class="card">
                    <ul class="social-links">
                        @foreach($user->links as $link)
                            <li><a href="{{$link->url}}" target="_blank"><i class="fab {{$link->icon}}"></i>&nbsp {{$link->name}}</a></li>
                        @endforeach
                        {{--<li><a href="#"><i class="fab fa-twitter"></i>&nbsp Twitter</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-instagram"></i>&nbsp Instagram</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-linkedin"></i>&nbsp Linkedin</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-medium"></i>&nbsp Medium</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-spotify"></i>&nbsp Spotify</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-blogger"></i>&nbsp Blogger</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-soundcloud"></i>&nbsp SoundCloud</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-dribbble-square"></i>&nbsp Dribbble</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-youtube"></i>&nbsp Youtube</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-behance"></i>&nbsp Behance</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-codepen"></i>&nbsp Codepen</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-github"></i>&nbsp Github</a></li>--}}
                        {{--<li><a href="#"><i class="fab fa-tumblr-square"></i>&nbsp Tumblr</a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="content">
                <ul class="project-cards">
                    <h2 class="content-title">
                        <img src="{{ URL::asset('img/fire.gif') }}" height="30">&nbsp Ateşledikleri ({{$user->projects->count()}})
                    </h2>
                    @include('layouts._project_list')
                </ul>
            </div>
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection
