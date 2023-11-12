<!DOCTYPE html>
<html lang="zxx" class="js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Fav Icon  -->
        <!-- Page Title  -->
        <title> @yield("title") | Sistema</title>
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{asset("assets/css/dashlite.css?ver=3.2.0")}}">
        <link id="skin-default" rel="stylesheet" href="{{asset("assets/css/theme.css?ver=3.2.0")}}">
    </head>

    <body class="nk-body ui-rounder npc-general pg-auth">
        <div class="nk-app-root">
            <!-- main @s -->
            <div class="nk-main ">
                <!-- wrap @s -->
                <div class="nk-wrap nk-wrap-nosidebar">
                    <!-- content @s -->
                    <div class="nk-content ">
                        @yield("content")
                    </div>
                    <!-- wrap @e -->
                </div>
                <!-- content @e -->
            </div>
            <!-- main @e -->
        </div>
        <!-- app-root @e -->
        <!-- JavaScript -->
        <script src="{{asset("assets/js/bundle.js?ver=3.2.0")}}"></script>
        <script src="{{asset("assets/js/scripts.js?ver=3.2.0")}}"></script>

        @stack("scripts")
    </body>
</html>
