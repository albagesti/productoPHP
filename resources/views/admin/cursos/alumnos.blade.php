@extends('layouts.menuSuperior')

<section id="main-content">
    <h1>Alumnos de este curso</h1>
    @foreach($students as $student)
            @if($student->enrollmentCourse == $id_course)
                <form action="../alumnos/remove" method="POST">
                @csrf
                    <h3>{{$student->username}}</h3>
                    <input type="hidden" name="id_course" value="{{$id_course}}">
                    <input type="hidden" name="id_enrollment" value="{{$student->id_enrollment}}">
                    <input type="submit" value="Eliminar del Curso">
                </form>
            @else
                <form action="../alumnos/add" method="POST">
                @csrf
                    <h3>{{$student->username}}</h3>
                    <input type="hidden" name="id_student" value="{{$student->id}}">
                    <input type="hidden" name="id_course" value="{{$id_course}}">
                    <input type="submit" value="Añadir al curso">
                </form>
            @endif

    @endforeach
</section>
