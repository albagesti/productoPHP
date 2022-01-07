<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\students;
use App\Models\courses;
use App\Models\Classes;

class AlumnoController extends Controller
{
    public function index(){
        $user = Auth::User();
        $student = students::get()->where('id', $user->id)->first();
        $cursos = students::join('enrollment', 'enrollment.id_student', '=', 'students.id')
        ->join('courses', 'courses.id_course', '=', 'enrollment.id_course')
        ->where('students.id', '=', $student->id)
        ->select('courses.id_course', 'courses.name', 'courses.description',
        'courses.date_start', 'courses.date_end', 'courses.active')->get();
        return view('alumnos/alumno', ['student' => $student, 'cursos' => $cursos]);
    }

    public function show($id_course){
        $cursos = courses::get()->where('id_course', '=', $id_course)->first();
        $clases = Classes::join('teachers', 'class.id_teacher', '=', 'teachers.id_teacher')
        ->join('schedule', 'class.id_schedule', '=', 'schedule.id_schedule')
        ->where('id_course', '=', $id_course)
        ->select('class.name as classname', 'class.color as color', 'teachers.name as teachername',
        'teachers.surname as surname',
        'schedule.day as day', 'schedule.time_start as start', 'schedule.time_end as end')->get();
        $notas = Classes::join('works', 'class.id_class', '=', 'works.id_class')
            ->join('exams', 'class.id_class', '=', 'exams.id_class')
            ->where('id_student', '=', Auth::user()->id);

        return view('alumnos.cursoDetalle', ['clases' => $clases, 'cursos' => $cursos, 'notas' => $notas]);
    }
}
