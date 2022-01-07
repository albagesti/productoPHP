<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teachers;

class TeachersController extends Controller
{
    public function index(){
        $teachers = teachers::get();
        return view('admin.teachers.teachers', [
            'teachers' => $teachers
        ]);
    }

    public function store(Request $request){
        $teacher = new teachers;
        $teacher->name=$request->get('name');
        $teacher->surname=$request->get('surname');
        $teacher->telephone=$request->get('telephone');
        $teacher->nif=$request->get('nif');
        $teacher->email=$request->get('email');
        $teacher->save();

        return redirect('teachers');
    }

    public function edit($id_teacher){
        $teacher = teachers::get()->where('id_teacher', $id_teacher)->first();
        return view('admin.teachers.update', [
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request, $id_teacher){
        $teacher = teachers::find($id_teacher);
        $teacher->name=$request->get('name');
        $teacher->surname=$request->get('surname');
        $teacher->telephone=$request->get('telephone');
        $teacher->nif=$request->get('nif');
        $teacher->email=$request->get('email');

        $teacher->save();

        return redirect('teachers');
    }

    public function delete($id_teacher){
        teachers::find($id_teacher)->delete();
        return redirect('teachers');
    }
}
