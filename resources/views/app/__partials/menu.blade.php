<div class="nk-sidebar-element">
    <div class="nk-sidebar-content">
        <div class="nk-sidebar-menu" data-simplebar>
            <ul class="nk-menu">
                @switch(auth()->user()->type)
                    @case("admin")
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                                <span class="nk-menu-text">Usuários</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="{{route("app.admin.users")}}" class="nk-menu-link"><span class="nk-menu-text">Listar usuários</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route("app.admin.users.add")}}" class="nk-menu-link"><span class="nk-menu-text">Adicionar Usuário</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        @break
                    @case("common")
                        <li class="nk-menu-item">
                            <a href="{{route("app.common.product")}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-cart"></em></span>
                                <span class="nk-menu-text">Produtos</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{route("app.common.category")}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-grid"></em></span>
                                <span class="nk-menu-text">Categorias</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{route("app.common.brand")}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-package"></em></span>
                                <span class="nk-menu-text">Marcas</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        @break
                @endswitch
            </ul><!-- .nk-menu -->
        </div><!-- .nk-sidebar-menu -->
    </div><!-- .nk-sidebar-content -->
</div><!-- .nk-sidebar-element -->
