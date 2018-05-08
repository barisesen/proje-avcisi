<nav id="sidebar">
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar2"><img src="/admin/img/wink.gif" alt=""></div>
        <div class="title">
            <h1 class="h5">{{ auth()->user()->name ?? Anonim}}</h1>
            <p>Admin</p>
        </div>
    </div>
    <ul class="list-unstyled">
        <li><a href="/admin"> <i class="fa fa-home"></i>Ana Sayfa</a></li>
        <li><a href="/admin/users"> <i class="fa fa-user"></i>Kullanıcılar</a></li>
        <li><a href="/admin/projects"> <i class="fa fa-bar-chart"></i>Projeler </a></li>
        <li><a href="/admin/categories"> <i class="fa fa-tags"></i>Kategoriler </a></li>
        <li><a href="/admin/tools"> <i class="fa fa-tasks"></i>Araçlar </a></li>
    </ul>
    <span class="heading">İstatistikler</span>
    <li>
        <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-windows"></i>Grafikler </a>
        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
            <li><a href="/admin/charts/user">User</a></li>
            <li><a href="/admin/charts/project">Proje</a></li>
            <li><a href="/admin/charts/tool">Araçlar</a></li>
        </ul>
    </li>
</nav>