@extends('layouts.app')

@section('content')
    <form action="{{route('projects.store')}}" method="post" class="form-control">
        @csrf
        <input type="text" class="form-control" name="title">
        <textarea name="content"  cols="30"  class="form-control" rows="10"></textarea>
        <select name="category_id" id="" class="form-control">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <input type="submit" class="form-control">
    </form>
@endsection