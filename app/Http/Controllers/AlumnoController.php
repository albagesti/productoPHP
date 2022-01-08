<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\students;
use App\Models\courses;
use App\Models\Classes;
use App\Models\work;
use App\Models\exam;
use App\Models\percentage;

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
        ->select('class.id_class', 'class.name as classname', 'class.color as color', 'teachers.name as teachername',
        'teachers.surname as surname', 'schedule.day as day',
        'schedule.time_start as start', 'schedule.time_end as end')->get();
        // $notas = Classes::leftjoin('works', 'class.id_class', '=', 'works.id_class')
        // ->leftjoin('exams', 'class.id_class', '=', 'exams.id_class')
        // ->leftjoin('percentage', 'class.id_class', '=', 'percentage.id_class')
        // ->where('works.id_student', '=', Auth::User()->id)
        // ->select('works.name as workname', 'works.mark as workmark',
        // 'exams.name as examname', 'exams.mark as exammark', 'percentage.continuous_assessment as continuous',
        // 'percentage.exams as exams')->get();
        $notasWork = work::where('id_student', '=', Auth::User()->id)->get();
        $notasExam = exam::where('id_student', '=', Auth::User()->id)->get();
        $percentages = percentage::where('id_course', '=', $id_course)->get();

        return view('alumnos.cursoDetalle', [
            'clases' => $clases,
            'cursos' => $cursos,
            'notasWork' => $notasWork,
            'notasExam' => $notasExam,
            'percentages' => $percentages
        ]);
    }
}
