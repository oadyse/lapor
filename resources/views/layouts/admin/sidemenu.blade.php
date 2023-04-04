<!-- Wrapper Start -->
<div class="wrapper">
    <div class="iq-sidebar  sidebar-default  ">
        <div class="iq-sidebar-logo d-flex align-items-end justify-content-between">
                <a href="{{ route('dashboard') }}" class="header-logo">
                <img src="{{asset('admin/assets/images/logo.png')}}" class="img-fluid rounded-normal light-logo" alt="logo">
                <img src="{{asset('admin/assets/images/logo-dark.png')}}" class="img-fluid rounded-normal d-none sidebar-light-img" alt="logo">
                <span>Datum</span>            
            </a>
            <div class="side-menu-bt-sidebar-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
        </div>
        <div class="data-scrollbar" data-scroll="1">
            <nav class="iq-sidebar-menu">
                <ul id="iq-sidebar-toggle" class="side-menu">
                    <li class="sidebar-layout {{is_active_menu(\Route::currentRouteName(),"dashboard")}}">
                        <a href="{{ route('dashboard') }}" class="svg-icon">
                            <i class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </i>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li class="px-3 pt-3 pb-2">
                        <span class="text-uppercase small font-weight-bold">Barang</span>
                    </li>
                     <li class="sidebar-layout {{is_active_menu(\Route::currentRouteName(),"barang.hilang")}}">
                        <a href="{{route('barang.hilang')}}" class="svg-icon">
                            <i class="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </i><span class="ml-2">Hilang</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="pt-5 pb-5"></div>
        </div>
    </div>
    <div class="iq-top-navbar">
        @include('layouts.admin.topmenu')
    </div>
    <div class="content-page">
        @yield('content')
    </div>
</div>
<!-- Wrapper End-->