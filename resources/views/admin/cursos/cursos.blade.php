@extends('layouts.menuSuperior')

<section id="main-content">

    <div class="content">
        <div><a  href="{{ url('admin/admin') }}">Atrás</a>
        <h3>Cursos Disponibles:</h3>
        <a href="{{ url('cursos/create') }}"><button id="nuevo-curso">Añadir Nuevo Curso</button></a>
        <div class="lista-cursos">
            @foreach($cursos as $curso)
                <div class="panel-curso @if($curso->active == 1) active-course @endif">
                    <h4>{{$curso->name}}</h4>
                    <p class="course-description">{{$curso->description}}</p>
                    <p>Fecha Inicio: {{$curso->date_start}}</p>
                    <p>Fecha Final: {{$curso->date_end}}</p>
                    <a href="{{ url('cursos/alumnos', [$curso->id_course]) }}"><button>Alumnos</button></a>
                    <a href="{{ url('cursos/edit', [$curso->id_course]) }}"><button>Editar</button></a>
                    <a href="{{ url('cursos/delete', [$curso->id_course])}}"><button>Eliminar</button></a>
                </div>
            @endforeach
        </div>
    </div>

</section>

<footer id="main-footer">
    <p><a>&copy; 2021 BackPHP </a></p>
</footer>

</body>
</html>



