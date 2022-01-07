@extends('layouts.menuSuperior')

    <div>
        <h1>Modificar {{$curso->name}}</h1>
        <form action="../edit/{{$curso->id_course}}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Nombre del Curso</label>
            <input type="text" name="name" value="{{$curso->name}}">
            <label for="description">Descripción del Curso</label>
            <textarea name="description" cols="30" rows="10">{{$curso->description}}</textarea>
            <label for="date_start">Fecha de Inicio</label>
            <input type="date" name="date_start" value="{{$curso->date_start}}">
            <label for="date_end">Fecha Final</label>
            <input type="date" name="date_end" value="{{$curso->date_end}}">
            <label for="active">Activo</label>
            <input type="checkbox" name="active" {{($curso->active) ? "checked" : ""}}>
            <input type="submit" value="Actualizar">
        </form>
    </div>

<footer id="main-footer">
    <p><a>&copy; 2021 BackPHP </a></p>
</footer>

</body>
</html>



