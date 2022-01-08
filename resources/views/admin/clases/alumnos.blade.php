@extends('layouts.menuSuperior')

<section id="main-content">
    <h1>Alumnos</h1>
    <p>Estos son los alumnos que estan cursando esta asignatura</p>
    @foreach($students as $student)
        <h4>{{$student->studentUsername}}</h4>
    @endforeach
</section>
