@extends("app.__partials.basic")
@section("title", "Adicionar Usuário")
@section("content")
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content" style="margin-left: auto; margin-right: auto;">
                    <h3 class="nk-block-title page-title">Adicionar usuário Comum</h3>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="nk-block nk-block-middle nk-auth-body">
                <form method="POST" action="{{route("app.admin.users.add-post")}}">
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
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{old("name")}}" placeholder="Nome">
                        </div>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg" id="email" name="email" value="{{old("email")}}" placeholder="Email">
                        </div>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">Digite a senha</label>
                        </div>
                        <div class="form-control-wrap">
                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" value="{{old("password")}}" placeholder="Senha">
                        </div>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password_confirm">Confirme a senha</label>
                        </div>
                        <div class="form-control-wrap">
                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password_confirm">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" class="form-control form-control-lg" id="password_confirm" value="{{old("password_confirm")}}" name="password_confirm" placeholder="Confirme a senha">
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
                                        <input type="checkbox" class="custom-control-input" name="permissions[]" id="permission1" value="product">
                                        <label class="custom-control-label" for="permission1">Produtos</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control">
                                        <input type="checkbox" class="custom-control-input" name="permissions[]" id="permission2" value="category">
                                        <label class="custom-control-label" for="permission2">Categorias</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control">
                                        <input type="checkbox" class="custom-control-input" name="permissions[]" id="permission3" value="brand">
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
