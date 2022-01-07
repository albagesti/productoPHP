@extends('layouts.menuSuperior')

<section id="main-content">

    <article>
        <div>
            <div><a  href="{{ url('/admin/admin') }}">Atrás</a>
            <h1>Profesores Disponibles:</h1>
            <form method="POST" action="{{url('teachers/create')}}">
                @csrf

                <p>Añadir nuevo Profesor</p>
                <input type="text" name="name" placeholder="Nombre del Profesor">
                <input type="text" name="surname" placeholder="Apellido del Profesor">
                <input type="text" name="telephone" placeholder="Teléfono del Profesor">
                <input type="text" name="nif" placeholder="NIF del Profesor">
                <input type="text" name="email" placeholder="Email del Profesor">
                <input type="hidden" name="createTeacher">
                <input type="submit" value="Agregar">
            </form>
            <h2>Lista Profesores:</h2>
            <table class="tabla-profesores">
                <tr class="teachers_title">
                    <td>Nombre</td>
                    <td>Apellido<br></td>
                    <td>Teléfono<br></td>
                    <td>NIF<br></td>
                    <td>Email<br></td>
                </tr
                @foreach($teachers as $teacher)
                    <tr class="teachers_row">
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->surname}}</td>
                        <td>{{$teacher->telephone}}</td>
                        <td>{{$teacher->nif}}</td>
                        <td>{{$teacher->email}}</td>
                        <td><a href="{{ url('/teachers/edit', [$teacher->id_teacher]) }}"><button>Editar</button></a></td>
                        <td><a href="{{ url('/teachers/delete', [$teacher->id_teacher]) }}"><button>Eliminar</button></a></td>
                    </tr>
                @endforeach
            </table>
        </div>

    </article>
</section>

<footer id="main-footer">
    <p><a>&copy; 2021 BackPHP </a></p>
</footer>

</body>
</html>





