<!DOCTYPE HTML>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <meta name="description" itemprop="description" content="@yield('description')">
        <meta name="keywords" itemprop="keywords" content="@yield('keywords')">
        @yield('pageCss')
    </head>

    <body>

        @yield('header')

        <div class="container">
            <!-- コンテンツ -->
                @yield('content')
        </div>

        @yield('footer')
    </body>

    </html>
