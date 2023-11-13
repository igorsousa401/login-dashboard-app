@extends("app.__partials.basic")
@section("title", "Editar Usuário")
@section("content")
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content" style="margin-left: auto; margin-right: auto;">
                    <h3 class="nk-block-title page-title">Editar Usuário</h3>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="nk-block nk-block-middle nk-auth-body">
                <form method="POST" action="{{route("app.admin.update-post", [$user->id])}}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="name">Nome</label>
                        </div>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{$user->name}}" placeholder="Nome">
                        </div>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg" id="email" name="email" value="{{$user->email}}" placeholder="Email">
                        </div>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password_confirm">Permissões</label>
                        </div>
                        <div class="form-control-wrap">
                            <ul class="custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control">
                                        <input type="checkbox" class="custom-control-input" name="permissions[]" id="permission1" value="product" {{in_array("product", $user->permissions) ? "checked" : ""}}>
                                        <label class="custom-control-label" for="permission1">Produtos</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control">
                                        <input type="checkbox" class="custom-control-input" name="permissions[]" id="permission2" value="category" {{in_array("category", $user->permissions) ? "checked" : ""}}>
                                        <label class="custom-control-label" for="permission2">Categorias</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control">
                                        <input type="checkbox" class="custom-control-input" name="permissions[]" id="permission3" value="brand" {{in_array("brand", $user->permissions) ? "checked" : ""}}>
                                        <label class="custom-control-label" for="permission3">Marcas</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">Editar</button>
                    </div>
                </form><!-- form -->
            </div><!-- .nk-block -->
        </div><!-- .nk-block -->
    </div>
@endsection
