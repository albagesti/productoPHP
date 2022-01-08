<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function perfil(){
        $user = Auth::User();
        $student = students::get()->where('id', $user->id)->first();
        return view('perfil', ['student' => $student]);
    }

    public function actualizar(Request $request){
        $student = students::find($request->get('id'));
        $student->username=$request->get('username');
        $student->email=$request->get('email');
        $student->pass=$request->get('pass');

        $student->save();

        return redirect('perfil');
    }
}
