@extends('layouts.menuSuperior')

<section id="main-content">
    <article>
        <div><a  href="{{ url('admin/admin') }}">Atrás</a>
        <h1>Clases</h1>
        <form method="POST" action="../clases">
            @csrf
            <label for="id_class">Añadir clase</label>
            <input type="text" name="name" placeholder="Nombre de la Clase" >
            <label for="id_teacher">Profesor/a</label>
            <input type="text" name="id_teacher" placeholder="ID Profesor/a" >
            <label for="day_start">Dia de la clase</label>
            <input type="date" name="day_start">
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
                    <td>Fecha<br></td>
                    <td>Color<br></td>
                </tr>
                <div class="lista-cursos">
                    @foreach($clases as $clase)
                        <tr>
                            <td>Nombre:{{$clase->name}}<br></td>
                            <td>Profesor:{{$clase->id_teacher}}<br></td>
                            <td>Fecha: {{$clase->day_start}}<br></td>
                            <td>Color: {{$clase->color}}<br></td>
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
