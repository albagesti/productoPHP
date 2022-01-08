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
            <li><a href="{{ url('schedulevent/add') }}"> Dias</a></li>
            <li><a href="alumno.php?schedule=week&week=0"> Semanas</a></li>
            <li><a href="alumno.php?schedule=month&month=0"> Meses</a></li>
            <li><a  href="{{ url('perfil') }}"> Perfil</a></li>
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

<section id="main-content">

    <article>
        <header>
            <h1>Bienvenido {{$student->name}}</h1>
        </header>

        <img src="https://www.uoc.edu/portal/_resources/common/imatges/sala_de_premsa/noticies/2016/202-nova-marca-uoc.jpg" alt="UOC" />

        <div class="content">
            @if(count($cursos) < 1)
                No estás inscrito en ningún curso... Espera a que tu profesor te inscriba.
            @else
                Estos son tus cursos inscritos:
            @endif
            <div class="lista-cursos-alumno">
                @foreach($cursos as $curso)

                    <div class="panel-curso-alumno @if($curso->active == 1) active-course @endif">
                        <a class="panel-curso-enlace" href="{{url('/alumno/curso', ['id_course' => $curso->id_course])}}">
                            <h4>{{$curso->name}}</h4>
                            <p class="course-description">{{$curso->description}}</p>
                            <p>Fecha Inicio: {{$curso->date_start}}</p>
                            <p>Fecha Final: {{$curso->date_end}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </article> <!-- /article -->

</section> <!-- / #main-content -->

<footer id="main-footer">
    <p><a>&copy; 2021 BackPHP </a></p>
</footer> <!-- / #main-footer -->

</body>
</html>
