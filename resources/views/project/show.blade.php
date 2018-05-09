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
                            <h1 style="text-transform: capitalize;">{{$project->title}}</h1>
                            <a href="/kategori/{{$project->category->slug}}" class="category-chip" style="background-color: {{ 'pink' }}">{{$project->category->name}}</a>
                        </div>
                    </div>
                    <div class="single-content-mid">
                        {{--<iframe width="560" height="315" src="https://www.youtube.com/embed/MTGyJoaFSH4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>--}}
                        <img width="560" height="315" src="{{isset($project->medias->first()->url) ? \Illuminate\Support\Facades\Storage::url($project->medias->first()->url) : ''}}" alt="">
                        <p>
                            {{$project->content}}
                        </p>
                    </div>
                </div><!-- card ends -->
                <div class="card">
                    <h3 class="card-title"><img src="{{ URL::asset('img/fire.gif') }}" height="30">&nbsp Ateşleyenler ({{$likes->count()}})</h3>
                    <div class="flex space-between">
                        <ul class="liked-users">
                            @foreach($likes as $like)
                                <li>
                                    <a href="/uye/{{$like->user->username}}" title="{{$like->user->username}}">
                                        <img src="{{ URL::asset('img/users/default.png')}}" class="circle-image size-36" alt="">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="/proje/{{$project->id}}/atesleyenler" class="view-all">Tümü</a>
                    </div>
                </div>
                <div class="card">
                    <h3 class="card-title">Yorumlar ({{$project->comments->count()}})</h3>
                    <div class="card form-group">
                        <form action="/projects/{{$project->id}}/comment" method="post">
                            <h4 class="card-title">Yorum Ekle</h4>
                            @csrf
                            <textarea type="text" class="form-text form-textarea" name="content" rows="15"></textarea>
                            <input type="submit" value="Yorumla" class="button full-btn blue-bg side-btn">
                        </form>
                    </div>
                    <ul class="comments">
                        @foreach($comments as $comment)
                            <li class="comment flex">
                                <a href="/uye/{{$comment->user->username}}">
                                    <img src="{{ URL::asset('img/users/default.png')}}" class="circle-image size-42" alt="">
                                </a>
                                <div class="comment-right">
                                    <a href="/uye/{{$comment->user->username}}">{{$comment->user->first_name}} {{$comment->user->last_name}}</a>
                                    <p>{{$comment->content}}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div><!-- content ends -->
            <div class="sidebar">
                @if($isLiked)
                    <form class="" action="/proje/{{$project->id}}/like/destroy" method="post">
                        @csrf
                        <button type="submit" class="button full-btn blue-bg side-btn" name="button"><i class="fas fa-fire"></i>&nbsp Ateşledin ({{$likes->count()}})</button>
                    </form>
                @else
                    <form class="" action="/proje/{{$project->id}}/like/store" method="post">
                        @csrf
                        <button type="submit" class="button full-btn blue-bg side-btn" name="button"><i class="fas fa-fire"></i>&nbsp Ateşle ({{$likes->count()}})</button>
                    </form>
                @endif

                <div class="card">
                    <h3 class="card-title">Proje Bağlantıları</h3>
                    <ul class="card-links">
                        @foreach($project->links as $link)
                            <li><a href="{{$link->url}}"><i class="{{$link->icon}}"></i>&nbsp {{$link->name}}'de ziyaret et.</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="card sm-padding">
                    <p><i class="fas fa-eye"></i>&nbsp {{$viewCount}} Görüntülenme</p>
                    <p><i class="fas fa-user-circle"></i>&nbsp <a href="#">Gürkan Şen</a> paylaştı.</p>
                </div>
                <div class="card">
                    <h3 class="card-title">Şunlarla ilgili</h3>
                    <ul class="tool-chips">
                        @foreach($project->tags as $tag)
                            <li><a href="/tag/{{$tag->slug}}">#{{$tag->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="card">
                    <h3 class="card-title">Paydaşlar</h3>
                </div>
                <div class="card">
                    <h3 class="card-title">Kullanılan Araçlar</h3>
                    <ul class="tool-chips">
                        @foreach($project->tools as $tool)
                            <li><a href="/tool/{{$tool->slug}}">#{{$tool->name}}</a></li>
                        @endforeach
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
