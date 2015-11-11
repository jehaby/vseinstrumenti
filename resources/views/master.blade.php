<html>
<head>
    @section('head')
        <title>@yield('title')</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
    @show
</head>
<body>

<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Vseinstrumenti</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/">Расписание <span class="sr-only">(current)</span></a></li>
            <li><a href="/form">Добавить поездку</a></li>
        </ul>
    </div>
</nav>

<div class="container">

    @yield('content')

</div>

</body>
</html>