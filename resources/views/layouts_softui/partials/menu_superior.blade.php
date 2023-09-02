<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
    id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="{{ url('') }}">
                        <i class="fa fa-fw fa-home"></i> Inicio
                    </a>
                </li>
                @yield('breadcrumb')
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
            </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ url('logout') }}" class="nav-link text-body font-weight-bold px-0">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="d-sm-inline d-none">Salir</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
