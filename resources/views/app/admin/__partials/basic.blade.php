<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <title>@yield("title") | Admin Dashboard</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset("assets/css/dashlite.css?ver=3.2.0")}}">
    <link id="skin-default" rel="stylesheet" href="{{asset("assets/css/theme.css?ver=3.2.0")}}">
</head>

<body class="nk-body ui-rounder has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        <div class="nk-sidebar is-light nk-sidebar-fixed is-light " data-content="sidebarMenu">
            <div class="nk-sidebar-element nk-sidebar-head">
                <div class="nk-sidebar-brand">
                    <h3>Dashboard</h3>
                </div>
                <div class="nk-menu-trigger me-n2">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                </div>
            </div><!-- .nk-sidebar-element -->
            @include("app.admin.__partials.menu")
        </div>
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            @include("app.admin.__partials.header")
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content nk-content-fluid">
                <div class="container-xl wide-xl">
                    @yield("content")
                </div>
            </div>
            <!-- content @e -->
            <!-- footer @s -->
            <div class="nk-footer">
                <div class="container-xl wide-xl">
                    @include("app.admin.__partials.footer")
                </div>
            </div>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->

<!-- JavaScript -->
<script src="{{asset("assets/js/bundle.js?ver=3.2.0")}}"></script>
<script src="{{asset("assets/js/scripts.js?ver=3.2.0")}}"></script>
</body>

</html>
