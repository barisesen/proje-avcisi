@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.header')
    <div class="d-flex align-items-stretch">
        @include('admin.layouts.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Araçlar</h2>
                    <hr>
                </div>
            </div>
            <div class="container">

                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Bütün Araçlar</h5>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#toolModal" style="float: right">Araç Ekle</button>
                    </div>
                    <div class="card-footer text-muted">
                        <table class="table table-light table-hover">
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
                            @if(isset($tools))
                                @foreach($tools as $tool)
                                    <tr>
                                        <th scope="row">{{ $tool->id }}</th>
                                        <td>{{ $tool->name }}</td>
                                        <td>{{ $tool->created_at }}</td>
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
    <div class="modal fade" id="toolModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Araç Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection