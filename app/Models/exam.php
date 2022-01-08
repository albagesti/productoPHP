<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    protected $table = 'exams';
    protected $primaryKey = 'id_exam';
    public $timestamps = false;
}
