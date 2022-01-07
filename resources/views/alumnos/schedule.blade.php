
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Cabecera fija</title>
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
</head>

<body>
<header id="main-header">
    <a id="logo-header" href="#">
        <span class="site-name">BackPHP</span>
    </a>
    <nav>
        <ul>
            <li><a href=""> DIAS</a></li>
            <li><a href=""> SEMANAS</a></li>
            <li><a href=""> MESES</a></li>
            <li><a  href="{{ url('perfil') }}"> Perfil</a></li>
            <li><a href={{ url('/logout') }}>Log Out</a></li>
        </ul>
    </nav>

    <div class="clases_container">
        <p><a href="{{ url('alumno') }}">Atrás</a></p>

        <h1>Horarios</h1>
        @foreach($clases as $clase)
        <form action="" method="POST">
            <input type="hidden" name="currentDay" value="day">
            <input type="hidden" name="scheduleType" value="day">
            <h4>Dia:<p>{{Carbon\Carbon::parse($clase->day)->format('d/m/Y')}}</p>
                <input type="submit" name="less" value="Atrás">
                <input type="submit" name="more" value="Adelante"></h4>

        </form>

        <table style="border-spacing: 0;">
            <tr>
                <th>Hora Inicio</th>
                <th>Hora Final</th>
                <th>Asignatura</th>
            </tr>
<!--            --><?php //while ($studentScheduleRow = mysqli_fetch_assoc($studentSchedule_list)) { ?>
            <tr style="background-color: {{$clase->color}}">
                <td>{{$clase->start}}</td>
                <td>{{$clase->end}}</td>
                <td>{{$clase->name}}</td>
            </tr>
        </table>
        @endforeach


    </div>

    <footer id="main-footer">
        <p><a>&copy; 2021 BackPHP </a></p>
    </footer>
</body>
</html>
