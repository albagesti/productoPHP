<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\courses;
use App\Models\students;
use App\Models\enrollment;

class CoursesController extends Controller
{
    public function index() {
        $cursos = courses::get();
        return view('admin.cursos.cursos', [
            'cursos' => $cursos
        ]);
    }

    public function create() {
        return view('admin.cursos.create');
    }

    public function store(Request $request) {
        $course = new courses;
        $course->name=$request->get('name');
        $course->description=$request->get('description');
        $course->date_start=$request->get('date_start');
        $course->date_end=$request->get('date_end');
        if($request->get('active') == 'on')
        {
            $course->active=1;
        }
        else{
            $course->active=0;
        }
        $course->save();

        return redirect('cursos');
    }

    public function edit($id_course){
        $curso = courses::get()->where('id_course', $id_course)->first();
        return view('admin.cursos.update', [
            'curso' => $curso
        ]);
    }

    public function update(Request $request, $id_course){
        $course = courses::find($id_course);
        $course->name=$request->get('name');
        $course->description=$request->get('description');
        $course->date_start=$request->get('date_start');
        $course->date_end=$request->get('date_end');
        if($request->get('active') == 'on')
        {
            $course->active=1;
        }
        else{
            $course->active=0;
        }
        $course->save();

        return redirect('cursos');
    }

    public function delete($id_course){
        courses::find($id_course)->delete();
        return redirect('cursos');
    }

    public function studentsEnroll($id_course){
        $students = students::leftjoin('enrollment', 'students.id', '=', 'enrollment.id_student')
        ->select('students.id', 'students.username', 'enrollment.id_enrollment',
        'enrollment.id_course as enrollmentCourse')->get();
        return view('admin.cursos.alumnos', ['students' => $students, 'id_course' => $id_course]);
    }

    public function studentRemove(Request $request){
        enrollment::find($request->id_enrollment)->delete();
        return redirect(url('cursos/alumnos', [$request->id_course]));
    }

    public function studentAdd(Request $request){
        $enrollment = new enrollment;
        $enrollment->id_student = $request->id_student;
        $enrollment->id_course = $request->id_course;
        $enrollment->save();
        return self::studentsEnroll($request->id_course);
    }
}
