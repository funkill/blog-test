<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Blog</title>
    <link rel="stylesheet" href="/css/styles.css" />
    <script src="/js/jquery.js" language="javascript"></script>
    <script src="/js/jquery.form.min.js" language="javascript"></script>
    <script src="/js/bootstrap.js" language="javascript"></script>
    <script src="/js/main.js" language="javascript"></script>
</head>
<body class="admin">
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ URL::route('main') }}" class="navbar-brand">Небольшой блог обо всём. Админка</a>
        </div>
    </div>
</nav>
<div class="container">
    @yield('navigation')
    @yield('content')
</div>
<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container center">
        <p class="navbar-text pull-right">&copy; {{ \Carbon\Carbon::now()->format('Y') }}</p>
    </div>
</div>

</body>
</html>