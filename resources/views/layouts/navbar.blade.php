<nav class="navbar">
    <div class="navbar-inner container">
        <a class="navbar-logo" href="{{ url('/') }}">
            Proje Avcısı
        </a>

        <ul class="navbar-nav flex space-between">
            <li><a href="{{ route('share-project') }}" class="button blue-bg">+ Proje Paylaş</a></li>
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">Giriş Yap</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">Üye Ol</a></li>
            @else
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        <button type="button" name="button">Çıkış Yap</button>
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>
