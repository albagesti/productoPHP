<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\students;
use App\Models\Classes;
use App\Models\Schedule;

class ScheduleController extends Controller
{

    public function index(){
        $user= Auth::user();
        $schedule = schedule::get()->where('id_schedule', $user->id)->first();
        $clase = students::join('enrollment', 'enrollment.id_student', '=', 'students.id')
            ->join('clase','clase.id_class','=', 'enrollment.id_class')
            ->where('schedule.id', '=', $schedule->id_schedule)
            ->select('clase.id_class', 'class.name','class.color',
                'class.date_start', 'class.active')->get();
        return view('alumnos/schedule', ['schedule' => $schedule, 'clases' => $clase]);
    }

    public function showdia($id_class){

    }
}
