@extends('layouts.menuSuperior')

<div>
    <h1>Modificar {{$clase->name}} {{$clase->id_teacher}} {{$clase->day_start}} {{$clase->color}}</h1>
    <form action="../edit/{{$clase->id_class}}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre de la Clase</label>
        <input type="text" name="name" value="{{$clase->name}}">
        <label for="id_teacher">Profesor/a</label>
        <select name="id_teacher">
            @foreach($teachers as $teacher)
                <option value="{{$teacher->id_teacher}}" @if($teacher->id_teacher == $clase->id_teacher) selected @endif>{{$teacher->name}} {{$teacher->surname}}</option>
            @endforeach
        </select>
        <label for="id_course">Curso</label>
            <select name="id_course">
                @foreach($courses as $course)
                    <option value="{{$course->id_course}}" @if($course->id_course == $clase->id_course) selected @endif>{{$course->name}}</option>
                @endforeach
            </select>
        <label >Color de la Clase</label>
        <input type="color" name="color" value="{{$clase->color}}">
        <input type="submit" value="Actualizar">
    </form>
</div>

<footer id="main-footer">
    <p><a>&copy; 2021 BackPHP </a></p>
</footer>

</body>
</html>
