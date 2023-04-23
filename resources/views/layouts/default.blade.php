<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DEMO-SITE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('site.index') }}">DEMO-SITE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Категории</a>
                        <ul class="dropdown-menu">
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $value)
                                    <li><a class="dropdown-item" href="{{ route('categories.show', ['slug' => $value->slug]) }}">{{ $value->title }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    @if (Auth::guard('web')->check() || Auth::guard('admin')->check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('site.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Выход') }}</a></li>
                        <form id="logout-form" action="{{ route('site.logout') }}" method="post" class="d-none">
                            @csrf
                        </form>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login.form') }}">Вход</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login.form') }}">Регистрация</a></li>
                    @endif
                    @if (Auth::guard('admin')->check())
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">Панель управления</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="row mt-5">
        <div class="row">
            <hr>
            <p>DEMO-SITE © {{ date('Y') }}</p>
        </div>
    </div>
</div>
<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="{{ asset('/assets/js/script.js') }}"></script>
</body>
</html>