@extends('layouts.menuSuperior')

<section id="main-content">
    <article>
        <div><a  href="{{ url('admin/admin') }}">Atrás</a>
        <h1>Clases</h1>
        <form method="POST" action="{{url('clases')}}">
            @csrf
            <label for="id_class">Añadir clase</label>
            <input type="text" name="name" placeholder="Nombre de la Clase" >
            <label for="id_teacher">Profesor/a</label>
            <select name="id_teacher">
                <option value="null" selected disabled>Escoge un profesor</option>
                @foreach($teachers as $teacher)
                    <option value="{{$teacher->id_teacher}}">{{$teacher->name}} {{$teacher->surname}}</option>
                @endforeach
            </select>
            <label for="id_course">Curso</label>
            <select name="id_course">
                @foreach($courses as $course)
                    <option value="{{$course->id_course}}">{{$course->name}}</option>
                @endforeach
            </select>
            <label >Color de la Clase</label>
            <input type="color" name="color" value="#ff0000">
            <input type="hidden" name="createClass">
            <input type="submit" value="Agregar" name="submit">
        </form>
        </div>
        <div class="content">
            <h2>Lista de Clases:</h2>
            <table>
                <tr class="clases_title">
                    <td>Nombre</td>
                    <td>Profesor<br></td>
                    <td>Curso</td>
                    <td>Color<br></td>
                </tr>
                <div class="lista-cursos">
                    @foreach($clases as $clase)
                        <tr>
                            <td>{{$clase->name}}<br></td>
                            <td>{{$clase->teacher_name}} {{$clase->teacher_surname}}<br></td>
                            <td>{{$clase->course_name}}</td>
                            <td style="width:40px; background-color:{{$clase->color}}"><br></td>
                            <td><a href="{{ url('/clases/horario', [$clase->id_class]) }}">Horario</a></td>
                            <td><a href="{{ url('/clases/edit', [$clase->id_class]) }}"><button>Editar</button></a></td>
                            <td><a href="{{ url('/clases/delete', [$clase->id_class]) }}"><button>Eliminar</button></a></td>
                        </tr>
                    </div>
                    @endforeach
            </table>
        </div>


    </article>

</section>
<footer id="main-footer">
    <p><a>&copy; 2021 BackPHP </a></p>
</footer> <!-- / #main-footer -->

</body>
</html>
