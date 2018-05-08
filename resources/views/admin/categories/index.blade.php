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
                        <h5 class="card-title">Bütün Kategoriler</h5>
                        <a href="#modal" class="btn btn-success" style="float: right">Kategori Ekle</a>
                    </div>
                    <div class="card-footer text-muted">
                        <table class="table table-responsive table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Oluşturma Tarihi</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>View</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
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
@endsection