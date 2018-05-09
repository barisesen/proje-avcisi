@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.header')
    <div class="d-flex align-items-stretch">
        @include('admin.layouts.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Projeler</h2>
                    <hr>
                </div>
            </div>
            <div class="container">

                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Bütün Projeler</h5>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#projectModal" style="float: right">Proje Ekle</button>
                    </div>
                    <div class="card-footer text-muted">
                        <table class="table table-light table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Kullanıcı</th>
                                <th>Başlık</th>
                                <th>İçerik</th>
                                <th>Kategoriler</th>
                                <th>Oluşturma Tarihi</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($projects))
                                @foreach($projects as $project)
                                    <tr>
                                        <th scope="row"><a href="/admin/projects/{{$project->id}}">{{ $project->id }}</a></th>
                                        <td>{{ $project->id}}</td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->content }}</td>
                                        <td>{{ $project->id }}</td>
                                        <td>{{ $project->created_at }}</td>
                                        <td><a href="" class="btn btn-info btn-sm">Edit</a></td>
                                        <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proje Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-group" action="/admin/projects" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                                <label >Proje Adı</label>
                                <input type="text" name="title" class="form-control" placeholder="Proje Adı">
                        </div>
                        <div class="form-group">
                            <label>Proje Açıklaması</label>
                            <textarea name="content" class="form-control form-textarea" placeholder="Proje hakkında bilgi (En az 320 karakter)"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Etiketler</label>
                            <input type="text" class="form-control" name="tags" placeholder="muhasebe, sosyal ağ">
                        </div>
                        <div class="form-group">
                            <label>Araçlar</label>
                            <input type="text" class="form-control" name="tools" placeholder="balzamiq, sketch, node.js, sass">
                        </div>
                        <button type="submit" class="button green-bg full-btn bolder-btn" name="button">
                            <i class="fa fa-paper-plane"></i>&nbsp Projeyi Paylaş
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection