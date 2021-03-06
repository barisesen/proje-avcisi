@extends('admin.layouts.main')

@section('content')
    @include('admin.layouts.header')
    <div class="d-flex align-items-stretch">
        @include('admin.layouts.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Kullanıcılar</h2>
                    <hr>
                </div>
            </div>
            <div class="container">

                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Bütün Kullanıcılar</h5>
                    </div>
                    <div class="card-footer text-muted">
                        <table class="table table-light table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>İsim</th>
                                <th>Soyisim</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Oluşturulma Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($users))
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td><a href="" class="btn btn-info btn-sm">Edit</a></td>
                                        <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Bütün Adminler</h5>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#adminModal" style="float: right">Admin Ekle</button>
                    </div>
                    <div class="card-footer text-muted">
                        <table class="table table-light table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>İsim</th>
                                <th>Email</th>
                                <th>Oluşturulma Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($admins))
                                @foreach($admins as $admin)
                                    <tr>
                                        <th scope="row">{{ $admin->id }}</th>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->created_at }}</td>
                                        <td><a href="" class="btn btn-info btn-sm">Edit</a></td>
                                        <td>
                                            <form action="{{action('Admin\AuthController@destroy')}}" method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <input name="id" type="hidden" value="{{ $admin->id }}">
                                                <button class="btn btn-danger btn-sm" type="submit" onclick="javascript:return confirm('Admini Silmek istiyormusunuz?')">Delete</button>
                                            </form>
                                        </td>
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
    <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Admin Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/register" method="GET">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="İsim Giriniz" name="name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Giriniz" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Parola Giriniz" name="password">
                        </div>
                        <input type="submit" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection