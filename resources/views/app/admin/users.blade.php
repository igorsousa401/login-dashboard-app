@extends("app.__partials.basic")
@section("title", "Usuários")
@section("content")
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Usuários</h3>
                    <div class="nk-block-des text-soft">
                        <p>Número de usuários: {{$users->count()}}.</p>
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="{{route("app.admin.users.add")}}"><span>Adicionar Usuário</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .toggle-wrap -->
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        @if($users->count() > 0)
            <div class="nk-block">
                <div class="card card-stretch">
                    <div class="card-inner-group">
                        <div class="card-inner p-0">
                            <div class="nk-tb-list nk-tb-ulist">
                                <div class="nk-tb-item nk-tb-head">
                                    <div class="nk-tb-col"><span class="sub-text">Usuário</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Tipo de usuário</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Permissões</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Ações</span></div>
                                </div><!-- .nk-tb-item -->
                                @foreach($users as $user)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <span>{{substr($user->name, 0, 2)}}</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">{{$user->name}} <span class="dot dot-success d-md-none ms-1"></span></span>
                                                    <span>{{$user->email}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-mb">
                                            <span class="tb-amount">
                                                @switch($user->type)
                                                    @case("admin")
                                                        Administrador
                                                        @break
                                                    @case("common")
                                                        Comum
                                                        @break
                                                @endswitch
                                            </span>
                                        </div>
                                        <div class="nk-tb-col tb-col-mb">
                                            <span class="tb-amount">
                                                @if(count($user->permissions) > 0)
                                                    @foreach($user->permissions as $permission)
                                                        @switch($permission)
                                                            @case("brand")
                                                                Marcas
                                                                @break
                                                            @case("product")
                                                                Produtos
                                                                @break
                                                            @case("category")
                                                                Categorias
                                                                @break
                                                            @case("all")
                                                                Usuários
                                                                @break
                                                        @endswitch
                                                    @endforeach
                                                @endif
                                            </span>
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{route("app.admin.update", [$user->id])}}"><em class="icon ni ni-edit"></em><span>Editar</span></a></li>
                                                                <li>
                                                                    <form method="POST" action="{{route("app.admin.delete-post", [$user->id])}}">
                                                                        @csrf
                                                                        <button type="submit"><em class="icon ni ni-trash"></em><span>Deletar</span></button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- .nk-tb-item -->
                                @endforeach
                            </div><!-- .nk-tb-list -->
                        </div><!-- .card-inner -->
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        @endif
    </div>
@endsection
