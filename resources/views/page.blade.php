<!DOCTYPE html>
<html lang="ja-JP">
<head>
    @yield('head')
</head>
<body>
    <div id="wrapper">
        <h1 id="page-title" class="fs-2 mb-4">@yield('title')</h1>
        @yield('content')
    </div>
    @yield('javascript')
</body>
</html>
