@extends('layouts.menuSuperior')
<div>
    <h1>Modificar {{$teacher->name}} {{$teacher->surname}}</h1>
    <form action="../edit/{{$teacher->id_teacher}}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre del Profesor</label>
        <input type="text" name="name" value="{{$teacher->name}}">
        <label for="surname">Apellido</label>
        <input type="text" name="surname" value="{{$teacher->surname}}">
        <label for="telephone">Teléfono</label>
        <input type="text" name="telephone" value="{{$teacher->telephone}}">
        <label for="nif">NIF</label>
        <input type="text" name="nif" value="{{$teacher->nif}}">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{$teacher->nif}}">
        <input type="submit" value="Actualizar">
    </form>
</div>

<footer id="main-footer">
    <p><a>&copy; 2021 BackPHP </a></p>
</footer>

</body>
</html>




