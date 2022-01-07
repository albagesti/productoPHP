@extends('layouts.menuSuperior')

    <div>
        <h1>Crear Nuevo Curso</h1>
        <form action="../cursos" method="POST" >
            @csrf
            <label for="name">Nombre del Curso</label>
            <input type="text" name="name">
            <label for="description">Descripción del Curso</label>
            <textarea name="description" cols="30" rows="10"></textarea>
            <label for="date_start">Fecha de Inicio</label>
            <input type="date" name="date_start">
            <label for="date_end">Fecha Final</label>
            <input type="date" name="date_end">
            <label for="active">Activo</label>
            <input type="checkbox" name="active">
            <input type="submit" value="Crear">
        </form>
    </div>

<footer id="main-footer">
    <p><a>&copy; 2021 BackPHP </a></p>
</footer>

</body>
</html>



