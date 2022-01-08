<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="../css/perfil.css">
</head>

<body>
<section class="seccion-perfil-usuario">
    <div class="perfil-usuario-header">

        <div class="perfil-usuario-portada">
            <nav>
                <ul>
                    <li><a href="alumno.php?schedule=day&day=0"> DIAS</a></li>
                    <li><a href="alumno.php?schedule=week&week=0"> SEMANAS</a></li>
                    <li><a href="alumno.php?schedule=month&month=0"> MESES</a></li>
                    <li><a href="{{ url('perfil') }}"> Perfil</a></li>

                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="perfil-usuario-body">
        <div class="perfil-usuario-bio">
            <a href="{{ url('alumno') }}">Atrás</a>
            <h3 class="titulo"></h3>
            <p class="texto"><br>Registered on:</p>

        </div>

        <div class="perfil-usuario-footer">
            <form method="POST" action="{{ url('perfil/actualizar') }}" aria-label="{{ __('Perfil') }}">
                @csrf
                <input id="id" type="hidden" name="id" value="{{ $student->id}}">
                <div class="form-group row">
                    <label for="username" class="col-sm-4 col-form-label text-md-right">{{ __('Username') }}</label>
                    <div class="col-md-6">
                        <input id="username" type="text"
                               class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                               value="{{ old('username') ?? $student->username}}" required autofocus>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email')  ?? $student->email }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pass" class="col-sm-4 col-form-label text-md-right">{{ __('Pass') }}</label>
                        <div class="col-md-6">
                            <input id="pass" type="password"
                                   class="form-control{{ $errors->has('pass') ? ' is-invalid' : '' }}" name="pass"
                                   value="{{ old('pass')  ?? $student->pass}}" required autofocus>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enviar') }}
                    </button>

            </form>

        </div>
    </div>
</section>
