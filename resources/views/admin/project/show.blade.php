@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.header')
    <div class="d-flex align-items-stretch">
        @include('admin.layouts.sidebar')
        <div class="page-content">
            <div class="page-header">
                <h3>{{ $project->title }}</h3>
                <p>{{ $project->content }}</p>
                <p style="float: right"> {{ $project->created_at }} <br> {{ $project->user->username }}</p>
                <h4>Tags</h4>
                @foreach($project->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach
                <h4>Tools</h4>
                @foreach($project->tools as $tool)
                    <li>{{ $tool->name }}</li>
                @endforeach
                @if(!empty($project->likes))
                    <h4>Likes</h4>
                    @foreach($project->likes as $like)
                        <p>{{ $like->user->username }}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection