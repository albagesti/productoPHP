<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Cabecera fija</title>

    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
</head>

<body>
<header id="main-header">
    <a id="logo-header" href="../../administrador.php">
        <span class="site-name">BackPHP</span>
    </a>
    <nav>
        <ul>
            <li><a href="{{ url('/teachers') }}">Profesores</a></li>
            <li><a href="{{ url('/cursos') }}">Cursos</a></li>
            <li><a href="{{ url('/clases') }}">Clases</a></li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </nav>
</header>
@yield('content')
