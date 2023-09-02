<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header shadow blur shadow-blur border-radius-xl"
        style="position: sticky; top: 0; z-index: 9; background-color: #f8f9fa">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="javascript:void(0)" onclick="cargar_url('')">
            <img src="{{ url('images/logo_app.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold" style="font-size: 1.5em">Gedenty</span>
        </a>
    </div>
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @foreach (getGruposMenuByUsuario(Session::get('id_usuario')) as $grupo)
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ $grupo->nombre }}</h6>
                </li>
                @foreach (getMenuByUsuarioGrupo(Session::get('id_usuario'), $grupo->id_grupo_menu) as $menu)
                    <li class="nav-item">
                        <a class="nav-link {{ isset($url) && $url == $menu->url ? 'active' : '' }}"
                            href="javascript:void(0)" onclick="cargar_url('{{ $menu->url }}')">
                            <div
                                class="icon icon-shape icon-sm shadow blur border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-fw fa-{{ $menu->icono }}"
                                    style="top: 0; color: {{ isset($url) && $url == $menu->url ? 'white' : 'black' }}"></i>
                            </div>
                            <span class="nav-link-text ms-1">{{ $menu->nombre }}</span>
                        </a>
                    </li>
                @endforeach
            @endforeach
        </ul>
    </div>
</aside>
