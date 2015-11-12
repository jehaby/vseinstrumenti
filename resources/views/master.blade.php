<html>
<head>
    @section('head')
        <title>@yield('title')</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
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
            <li {{ Request::is('/') ? 'class=active' : '' }}><a href="/">Расписание <span class="sr-only">(current)</span></a></li>
            <li {{ Request::is('form') ? 'class=active' : '' }}><a href="/form">Добавить поездку</a></li>
        </ul>
    </div>
</nav>


<div class="container-fluid">

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    @yield('content')

</div>

<script>
    $(document).ready(function() {
        $('.alert-success').delay(1969).fadeOut();
    })
</script>

</body>
</html>