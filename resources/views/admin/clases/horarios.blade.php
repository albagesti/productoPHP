@extends('layouts.menuSuperior')

<h1>Horario {{$clase->name}} <div style="height:30px; background-color:{{$clase->color}}"></div></h1>

<form action="../horario/{{$clase->id_class}}" method="POST">
    @csrf
    @method('PUT')
    <label for="day">Dia</label>
    <input type="date" name="day" value="@isset($schedule->day){{$schedule->day}}@endisset">
    <label for="time_start">Inicio</label>
    <input type="time" name="time_start" value="@isset($schedule->time_start){{$schedule->time_start}}@endisset">
    <label for="time_end">Final</label>
    <input type="time" name="time_end" value="@isset($schedule->time_end){{$schedule->time_end}}@endisset">
    <input type="hidden" name="id_schedule" value="@isset($schedule->id_schedule){{$schedule->id_schedule}}@endisset">
    <input type="submit" value="@isset($schedule) Modificar @else Añadir @endisset">
</form>
