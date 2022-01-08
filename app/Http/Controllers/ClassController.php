<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\teachers;
use App\Models\courses;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class ClassController extends Controller
{
    public function index()
    {
        $clases = Classes::join('teachers', 'class.id_teacher', '=', 'teachers.id_teacher')
        ->join('courses', 'class.id_course', '=', 'courses.id_course')
        ->select('class.name as name', 'class.color', 'class.id_class', 'teachers.id_teacher',
        'teachers.name as teacher_name', 'teachers.surname as teacher_surname',
        'courses.id_course', 'courses.name as course_name')->orderBy('courses.name')->get();
        $teachers = teachers::get();
        $courses = courses::get();
        return view('admin.clases.clases', [
            'clases' => $clases, 'teachers' => $teachers, 'courses' => $courses
        ]);
    }

    public function store(Request $request)
    {
        $clase = new Classes;
        $clase->name = $request->get('name');
        $clase->id_teacher = $request->get('id_teacher');
        $clase->id_course = $request->get('id_course');
        $clase->color = $request->get('color');
        $clase->save();
        return redirect('clases');

    }

    public function edit($id_class){
        $clase = Classes::join('teachers', 'class.id_teacher', '=', 'teachers.id_teacher')->select(
        'class.name as name', 'class.color', 'teachers.id_teacher', 'teachers.name as teacher_name',
        'teachers.surname as teacher_surname', 'class.id_course',
        'class.id_class')->where('id_class',$id_class)->get()->first();
        $teachers = teachers::get();
        $courses = courses::get();
        return view('admin.clases.updateclases',[
           'clase'=>$clase, 'teachers' => $teachers, 'courses' => $courses
        ]);
    }
    public function update(Request $request, $id_class){
        $clase = Classes::find($id_class);
        $clase->name = $request->get('name');
        $clase->id_teacher = $request->get('id_teacher');
        $clase->id_course = $request->get('id_course');
        $clase->color = $request->get('color');
        $clase->save();
        return redirect('clases');
    }

    public function delete($id_class){
        Classes::find($id_class)->delete();
        return redirect('clases');
    }

    public function horario($id_class){
        $clase = Classes::find($id_class);
        $schedule = Schedule::get()->where('id_class', $id_class)->first();
        return view('admin.clases.horarios', [
            'clase' => $clase, 'schedule' => $schedule
        ]);
    }

    public function sethorario(Request $request, $id_class){
        if(isset($request->id_schedule))
            $schedule = Schedule::find($request->id_schedule);
        else
            $schedule = new Schedule;
        $schedule->day = $request->day;
        $schedule->time_start = $request->time_start;
        $schedule->time_end = $request->time_end;
        $schedule->id_class = $id_class;
        $schedule->save();
        return redirect('clases');
    }

}
