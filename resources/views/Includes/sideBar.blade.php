<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button
        type="button"
        class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect"
    >
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center bg-logo">
            <a href="index.html" class="logo"
                ><i class="mdi mdi-bowling text-success"></i> Zoogler</a
            >
            
        </div>
    </div>

@include('Includes.userProfile')
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard" class="waves-effect">
                        <i class="dripicons-device-desktop"></i>
                        <span>
                            Dashboard
                            <span class="badge badge-pill badge-primary float-right">{{ config('global.jumlahPesananProses', 0) }}</span>

                        </span>
                        
                    </a>
                </li>
                
                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{ Request::is('list-meja*') || Request::is('pelanggan*')  ? 'active' : '' }}">
                        <i class="fas fa-user"></i>
                        <span>Client</span>
                        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
                    </a>
                    <ul class="list-unstyled">
                        <li class="{{ Request::is('list-meja*') ? 'active' : '' }}">
                            <a href="/list-meja">
                                <i class="fas fa-chair"></i>
                                List Meja
                            </a>
                        </li>
                        <li class="{{ Request::is('pelanggan*') ? 'active' : '' }}">
                            <a href="/pelanggan">
                                <i class="fas fa-user"></i>
                                Pelanggan
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{ Request::is('kategori-menus*') || Request::is('menus*') ? 'active' : '' }}">
                        <i class="fas fa-list"></i>
                        <span>Menu Restaurant</span>
                        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
                    </a>
                    <ul class="list-unstyled">
                        <li class="{{ Request::is('kategori-menus*') ? 'active' : '' }}">
                            <a href="{{ route('kategori-menus.index') }}">
                                <i class="fas fa-list"></i> 
                                Kategori Menu
                            </a>
                        </li>
                        <li class="{{ Request::is('menus*') ? 'active' : '' }}">
                            <a href="{{ route('menus.index') }}">
                                <i class="fas fa-list"></i> 
                                Menu
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{ Request::is('pesanans*') || Request::is('menu_pesanans*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-basket"></i> 
                        <span>Pesanan</span>
                        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
                    </a>
                    <ul class="list-unstyled">
                        <li class="{{ Request::is('pesanans*') ? 'active' : '' }}">
                            <a href="{{ route('pesanans.index') }}">
                                <i class="fas fa-receipt"></i> 
                                Pesanans
                            </a>
                        </li>
                        <li class="{{ Request::is('menu_pesanans*') ? 'active' : '' }}">
                            <a href="{{ route('menu_pesanans.index') }}">
                                <i class="fas fa-utensils"></i> 
                                Menu Pesanan
                            </a>
                        </li>
                    </ul>
                </li>
                
                
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
