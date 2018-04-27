@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="sm-container">
        <div class="sm-content">
            <div class="card">
                <h2 class="card-title">Giriş Yap</h2>
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">E-posta Adresiniz:</label>
                        <div class="input-group">
                            <input id="email" type="email" class="form-text check-value" name="email" value="{{ old('email') }}" placeholder="eposta@mail.com" required autofocus>
                            <div class="form-icon"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Parolanız:</label>
                        <div class="input-group">
                            <input id="password" type="password" class="form-text check-value" name="password" placeholder="***" required>
                            <div class="form-icon"></div>
                        </div>
                    </div>

                    <div class="form-group flex space-between">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember" checked> Beni Hatırla
                        </label>
                        <a class="secondary-link" href="{{ route('password.request') }}">
                            Parolamı Unuttum
                        </a>
                    </div>
                    <button type="submit" class="button blue-bg full-btn">
                        Giriş Yap
                    </button>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
