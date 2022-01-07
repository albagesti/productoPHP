@extends('layouts.menuSuperior')

<div>
    <h1>Modificar {{$clase->name}} {{$clase->id_teacher}} {{$clase->day_start}} {{$clase->color}}</h1>
    <form action="../edit/{{$clase->id_class}}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre de la Clase</label>
        <input type="text" name="name" value="{{$clase->name}}">
        <label for="id_teacher">Profesor/a</label>
        <input type="text" name="id_teacher" value="{{$clase->id_teacher}} ">
        <label for="day_start">Dia de la clase</label>
        <input type="date" name="day_start" value="{{$clase->day_start}}">
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
