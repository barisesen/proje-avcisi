<nav class="navbar">
    <div class="navbar-inner container">
        <div class="navbar-left flex space-between vertical-center">
            <a class="nav-logo" href="{{ url('/') }}">
                Proje Avcısı
            </a>

            <div class="nav-search">
                <form class="nav-search-form flex space-between vertical-center" action="" method="GET">
                    @csrf
                    <input type="text" name="q" class="nav-search-text" placeholder="Proje ara..">
                    <button type="submit" name="button" class="nav-search-btn"><i class="fas fa-search fa-lg"></i></button>
                </form>
            </div>
        </div>

        <div class="nav-right flex space-between vertical-center">
            <div class="nav-categories-dropdown">
                <a href="{{ url('kategoriler') }}" class="nav-categories-btn">
                    <i class="fas fa-bars fa-lg"></i>&nbsp Kategoriler
                </a>

                <div class="sub-navbar">
                    <ul class="sub-nav-categories flex wrap">
                        @foreach ($categories as $category)<li class="sm-category-card">
                            <a href="#">{{ $category->name }}</a>
                        </li>@endforeach
                    </ul>
                </div>
            </div>

            <ul class="navbar-nav flex space-between vertical-center">
                @if(!\Request::is('paylas') && !\Request::is('register'))
                    <li><a href="{{ route('share-project') }}" class="button red-bg"><i class="fas fa-paper-plane"></i>&nbsp Proje Paylaş</a></li>
                @endif
                @guest
                    <li><a class="nav-guest-link" href="{{ route('login') }}">Giriş Yap</a></li>
                    <li><a class="nav-guest-link" href="{{ route('register') }}">Üye Ol</a></li>
                @else
                    <li>
                        <a href="{{ url('bildirimler') }}" class="nav-link">
                            <i class="far fa-bell fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-user">
                        <a href="{{ url('uye/gurkansen') }}" class="nav-link">
                            <i class="far fa-user fa-lg"></i>
                        </a>
                        <ul class="user-dropdown">
                            <div class="dropdown-arrow"><i class="fas fa-caret-up fa-2x"></i></div>
                            <li><a href="{{ url('uye/gurkansen') }}"><i class="far fa-user"></i>&nbsp Profili Gör</a></li>
                            <li><a href="{{ url('uye/hesap') }}"><i class="fas fa-cog"></i>&nbsp Hesap Ayarları</a></li>
                            <li><a href="{{ url('uye/e-posta') }}"><i class="fas fa-at"></i>&nbsp E-posta Bildirimleri</a></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" name="button" class="dropdown-link">
                                        <i class="fas fa-sign-out-alt"></i>&nbsp Çıkış Yap
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
