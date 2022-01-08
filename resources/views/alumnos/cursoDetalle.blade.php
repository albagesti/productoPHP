<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Cabecera fija</title>
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
</head>

<body>
<header id="main-header">
    <a id="logo-header" href="{{url()->previous()}}">
        <span class="site-name">BackPHP</span>
    </a>
    <nav>
        <ul>
            <li><a href="alumno.php?schedule=day&day=0"> Dias</a></li>
            <li><a href="alumno.php?schedule=week&week=0"> Semanas</a></li>
            <li><a href="alumno.php?schedule=month&month=0"> Meses</a></li>
            <li><a  href="{{ url('perfil') }}"> Perfil</a></li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </nav>
</header>

<section id="main-content">

    <article>

        <div class="content">
            <h2>Clases de {{$cursos->name}}</h2>
            <div>
                @foreach($clases as $clase)
                    <div class="panel-curso-alumno" >
                        <h3>{{$clase->classname}}</h3>
                        <div class="detalle-clase">
                            <h5>{{$clase->teachername}} {{$clase->surname}}</h5>
                            <p>{{Carbon\Carbon::parse($clase->day)->format('d/m/Y')}}</p>
                            <p>{{Carbon\Carbon::parse($clase->start)->format('H:i')}}</p>
                            <p>{{Carbon\Carbon::parse($clase->end)->format('H:i')}}</p>
                            <div style="background-color: {{$clase->color}}; width: 50px; height: 50px;"></div>
                        </div>
                        <div class="detalle-clase">
                            <h4>Notas:</h4>
                            <div class="detalle-notas">
                            <!-- {{$workCounter = 0}} -->
                            <!-- {{$sumaWorks = 0}} -->
                                @foreach($notasWork as $notaWork)
                                    @if($notaWork->id_class == $clase->id_class)
                                        <div class="nota">
                                            <h6>{{$notaWork->name}}</h6>
                                            <p>{{$notaWork->mark}}</p>
                                        </div>
                                        <!-- {{$sumaWorks += $notaWork->mark}} -->
                                        <!-- {{$workCounter++}} -->
                                    @endif
                                @endforeach
                            </div>
                            <div class="detalle-notas notas-examenes">
                                <!-- {{$examCounter = 0}} -->
                                <!-- {{$sumaExams = 0}} -->
                                @foreach($notasExam as $notaExam)
                                        @if($notaExam->id_class == $clase->id_class)
                                            <div class="nota">
                                                <h6>{{$notaExam->name}}</h6>
                                                <p>{{$notaExam->mark}}</p>
                                            </div>
                                            <!-- {{$sumaExams += $notaExam->mark}} -->
                                            <!-- {{$examCounter++}} -->
                                        @endif
                                @endforeach
                            </div>
                            <div>
                                <!-- {{$notaExamenes = 0}} -->
                                @if(count($percentages) > 0)
                                    @foreach($percentages as $percentage)
                                            @if($percentage->id_class == $clase->id_class)
                                                <div class="nota">
                                                    <h6>EC ({{$percentage->continuous_assessment}}%)</h6>
                                                    <p>{{$notaEC = $sumaWorks/$workCounter}}</p>
                                                </div>
                                                <div class="nota">
                                                <!-- {{$notaExamenes = $sumaExams/$examCounter}} -->
                                                    <h6>Nota Final</h6>
                                                    <p>{{($notaEC * ($percentage->continuous_assessment/100)) + ($notaExamenes * ($percentage->exams/100))}}</p>
                                                </div>
                                            @endif
                                    @endforeach
                                @else
                                    <p>Aun no se han decidio los porcentajes finales</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </article> <!-- /article -->

</section> <!-- / #main-content -->

<footer id="main-footer">
    <p><a>&copy; 2021 BackPHP </a></p>
</footer> <!-- / #main-footer -->

</body>
</html>
