<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClassController extends Controller
{
    public function index()
    {
        $clases = Classes::get();
        return view('admin.clases.clases', [
            'clases' => $clases
        ]);
    }

    public function store(Request $request)
    {
        $clase = new Classes;
        $clase->name = $request->get('name');
        $clase->id_teacher = $request->get('id_teacher');
        $clase->day_start = $request->get('day_start');
        $clase->color = $request->get('color');
        $clase->save();
        return redirect('clases');

    }

    public function edit($id_class){
        $clase = Classes::get()->where('id_class',$id_class)->first();
        return view('admin.clases.updateclases',[
           'clase'=>$clase
        ]);
    }
    public function update(Request $request, $id_class){
        $clase = Classes::find($id_class);
        $clase->name = $request->get('name');
        $clase->id_teacher = $request->get('id_teacher');
        $clase->day_start = $request->get('day_start');
        $clase->color = $request->get('color');
        $clase->save();
        return redirect('clases');
    }

    public function delete($id_class){
        Classes::find($id_class)->delete();
        return redirect('clases');
    }


}
