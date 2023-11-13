<div class="nk-header is-light nk-header-fixed is-light">
    <div class="container-xl wide-xl">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1 me-3">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>{{substr(auth()->user()->name, 0, 2)}}</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{auth()->user()->name}}</span>
                                        <span class="sub-text">{{auth()->user()->email}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <form method="POST" action="{{route("auth.logout")}}">
                                        @csrf
                                        <li><button type="submit"><em class="icon ni ni-signout"></em><span>Logout</span></button></li>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
