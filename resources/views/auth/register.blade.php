@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="sm-container">
        <div class="sm-content">
            <div class="card">
                <h2 class="card-title">Üye Ol</h2>
                <form class="login-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">E-posta Adresiniz:</label>
                        <div class="input-group">
                            <input id="email" type="email" class="form-text check-value" name="email" data-type="email" value="{{ old('email') }}" placeholder="eposta@mail.com" required autofocus>
                            <div class="form-icon"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="form-label">Kullanıcı Adınız:</label>
                        <div class="input-group">
                            <input id="username" type="text" class="form-text check-value" name="username" data-type="username" value="{{ old('username') }}" placeholder="kullanici" required autofocus>
                            <div class="form-icon"></div>
                        </div>
                    </div>

                    <div class="flex space-between">
                        <div class="form-group">
                            <label for="name" class="form-label">Adınız:</label>
                            <div class="input-group">
                                <input id="first_name" type="text" class="form-text" name="first_name" value="{{ old('first_name') }}" placeholder="Adınız" required autofocus>
                                <div class="form-icon"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="surname" class="form-label">Soyadınız:</label>
                            <div class="input-group">
                                <input id="last_name" type="text" class="form-text" name="last_name" data-type="username" value="{{ old('last_name') }}" placeholder="Soyadınız" required autofocus>
                                <div class="form-icon"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Parolanız:</label>
                        <div class="input-group">
                            <input id="password" type="password" class="form-text check-value" name="password" data-type="password" placeholder="***" required>
                            <div class="form-icon"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Parolanız:</label>
                        <div class="input-group">
                            <input id="password-confirm" type="password" class="form-text check-value" name="password_confirmation" data-type="password-confirm" placeholder="***" required>
                            <div class="form-icon"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember" checked> <a href="#">Kullanıcı sözleşmesini</a> okudum, kabul ediyorum.
                        </label>
                    </div>
                    <button type="submit" class="button blue-bg full-btn">
                        Üyeliğimi Tamamla
                    </button>

                    @if ($errors->has('username'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
