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
                    <button type="button" name="button" class="nav-search-btn"><i class="fas fa-search fa-lg"></i></button>
                </form>
            </div>
        </div>

        <div class="nav-right flex space-between vertical-center">
            <div class="nav-categories-dropdown">
                <a href="{{ url('kategoriler') }}" class="nav-categories-btn">
                    <i class="fas fa-bars fa-lg"></i>&nbsp Kategoriler
                </a>

                <div class="sub-navbar">
                    <ul class="sub-nav-categories">
                        <li class="sm-category-card"><a href="#">Yazılım</a></li>
                        <li class="sm-category-card"><a href="#">Tasarım</a></li>
                        <li class="sm-category-card"><a href="#">Kanal</a></li>
                        <li class="sm-category-card"><a href="#">Eğitim</a></li>
                        <li class="sm-category-card"><a href="#">Araç</a></li>
                        <li class="sm-category-card"><a href="#">Kitap</a></li>
                    </ul>
                </div>
            </div>

            <ul class="navbar-nav flex space-between vertical-center">
                <li><a href="{{ route('share-project') }}" class="button blue-bg"><i class="fas fa-paper-plane"></i>&nbsp Proje Paylaş</a></li>
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">Giriş Yap</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Üye Ol</a></li>
                @else
                    <li>
                        <a href="{{ url('bildirimler') }}" class="nav-link">
                            <i class="far fa-bell fa-lg"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('uye/gurkansen') }}" class="nav-link">
                            <i class="far fa-user fa-lg"></i>
                        </a>
                    </li>
                    <!--<li>
                        <a href="#" class="nav-link nav-image-link flex vertical-center">
                            <img src="img/default.png" class="circle-image size-36" alt="{{ 'User Name' }}">
                        </a>
                    </li>-->
                    <!--<li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="button" name="button">Çıkış Yap</button>
                        </form>
                    </li>-->
                @endguest
            </ul>
        </div>
    </div>
</nav>
