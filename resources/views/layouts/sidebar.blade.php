<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#master-data" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="master-data">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link collapse warna" href="{{route('dashboard.hidangan')}}">Hidangan</a></li>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.orderan') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Orderan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.rekapOrder') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Rekap Orderan</span>
            </a>
        </li>
    </ul>
</nav>
